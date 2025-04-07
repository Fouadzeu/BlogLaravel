<?php

namespace App\Http\Controllers;

use App\Models\Devoir;
use App\Models\Resultat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ResultatController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'devoir_id' => 'required|exists:devoirs,id',
            'specialite_id' => 'required|exists:specialites,id',
            'content' => 'nullable|string',
            'document' => 'nullable|mimes:jpeg,jpg,png,gif,pdf|max:4096',
        ]);

        $resultatExistant = Resultat::where('devoir_id', $request->devoir_id)
                                    ->where('user_id', auth()->user()->id)
                                    ->exists();

        if ($resultatExistant) {
            return redirect()->back()->withErrors(['error' => 'Vous avez déjà soumis un résultat pour ce devoir.']);
        }

        $resultat = new Resultat();
        $resultat->devoir_id = $request->devoir_id;
        $resultat->specialite_id = $request->specialite_id;
        $resultat->user_id = auth()->user()->id;
        $resultat->content = $request->content;

        if ($request->hasFile('document')) {
            $documentName = time() . '.' . $request->document->extension();
            $request->document->move(public_path('documents'), $documentName);
            $resultat->document = $documentName;
        }

        $resultat->date_envoi = now();
        $resultat->save();

        return redirect()->back()->with('success', 'Votre résultat a été soumis avec succès ! 🎉');
    }


    //
    //professeur
    //

        public function resultat($id)
        {
            // Récupérer le devoir
            $devoir = Devoir::findOrFail($id);

            // Récupérer les résultats soumis pour ce devoir
            $resultats = Resultat::where('devoir_id', $devoir->id)->get();

            // Passer les données à la vue
            return view('resultat.index', compact('devoir', 'resultats'));
        }




        public function show($id)
        {

            $user = User::findOrFail($id);

            $devoir = Devoir::all();

            $resultats = Resultat::where('user_id', $user->id)
                                 ->whereIn('devoir_id', $devoir->pluck('id')) // Vérifie que l'ID du devoir correspond
                                 ->get();

            // Passer les données à la vue
            return view('resultat.show', compact('user', 'resultats'));
        }


        public function update(Request $request, $id)
{
    $resultat = Resultat::findOrFail($id);


    if (Auth::guard('professeur')->user()->id !== $resultat->devoir->professeur_id) {
        return redirect()->route('professeur.devoirs.index')->with('error', 'Vous n\'êtes pas autorisé à modifier ce résultat.');
    }


    $request->validate([
        'note' => 'required|numeric|min:0|max:20',
        'commentaire' => 'nullable|string|max:255',
    ]);


    $resultat->note = $request->input('note');
    $resultat->commentaire = $request->input('commentaire');
    $resultat->save();

    return redirect()->back()->with('statut','Le résultat a été mis à jour avec succès.');
}
}

