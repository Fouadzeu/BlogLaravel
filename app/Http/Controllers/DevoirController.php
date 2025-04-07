<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Devoir;
use App\Models\Resultat;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DevoirController extends Controller

{
    //general

    public function showProfDevoir($id)
    {
        // Récupérer le devoir
        $devoir = Devoir::findOrFail($id);

        // Passer les données à la vue
        return view('devoir.show', compact('devoir'));
    }



    //
    //User Devoir
    //

    public function index()
{
    $user = auth()->user();
    $specialiteId = $user->specialite_id;

    $devoirs = Devoir::where('specialite_id', $specialiteId)->with('professeur')->get();

    foreach ($devoirs as $devoir) {
        if ($devoir->date_fin < now()) {
            $devoir->statut = 'terminé';
        } elseif ($devoir->date_debut > now()) {
            $devoir->statut = 'commencé';
        } else {
            $devoir->statut = 'en cours';
        }
    }

    // Récupérer les devoirs auxquels l'utilisateur est déjà inscrit
    $inscriptions = $user->devoirs->pluck('id')->toArray();

    return view('devoir_user.index', compact('devoirs', 'inscriptions'));
}
    public function inscrire(Request $request)
{
    $user = User::find($request->userId);
    $devoir = Devoir::find($request->devoirId);

    if ($user && $devoir  && !$user->devoirs->contains($devoir->id)) {
        $user->devoirs()->syncWithoutDetaching($devoir->id);
        return redirect()->back()->with('success', 'Inscription réussie au devoir.');
    }

    return redirect()->back()->with('error', 'Erreur lors de l\'inscription au devoir.');
}

public function show($id)
    {

            // Récupérer le devoir
            $devoir = Devoir::findOrFail($id);

            // Vérifier si l'utilisateur a déjà soumis un résultat pour ce devoir
            $resultatExistant = Resultat::where('devoir_id', $devoir->id)
                                        ->where('user_id', Auth::user()->id)
                                        ->first();

            // Passer les données à la vue

        return view('devoir_user.show', compact('devoir', 'resultatExistant'));
    }

    //
    //Professeur devoir
    //

    public function create()
    {
        $specialites=Specialite::all();
        $prof=Auth::guard('professeur')->user();
        return view('devoir_make.index',compact('prof','specialites'));
    }

    public function store(Request $request)
{
    \Log::info('Début de la méthode store');

    // Validation conditionnelle
    $request->validate([
        'titre' => 'required|string|max:255',
        'professeur_id' => 'required',
        'specialite_id' => 'required',
        'cour' => 'required',
        'content' => 'nullable',
        'document' => 'nullable|mimes:jpeg,jpg,png,gif,pdf|max:4096',
        'description' => 'required|string',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date|after_or_equal:date_debut',
    ]);

    if (empty($request->content) && !$request->hasFile('document')) {
        return redirect()->back()->withErrors(['document' => 'Le document est requis si le contenu est vide.']);
    }

    try {
        $devoir = new Devoir;
        $devoir->titre = $request->titre;
        \Log::info('Titre du devoir : ' . $request->titre);
        $devoir->cour = $request->cour;
        $devoir->content = $request->content;
        $devoir->professeur_id = $request->professeur_id;
        $devoir->specialite_id = $request->specialite_id;
        $devoir->description = $request->description;
        $devoir->date_debut = $request->date_debut;
        $devoir->date_fin = $request->date_fin;

        if ($request->hasFile('document')) {
            $documentName = time() . '.' . $request->document->extension();
            $request->document->move(public_path('documents'), $documentName);
            $devoir->document = $documentName;
            \Log::info('Document téléchargé : ' . $documentName);
        }

        $devoir->save();
        \Log::info('Devoir sauvegardé avec succès');

        return redirect()->back()->with('success', 'Devoir créé avec succès!');
    } catch (\Exception $e) {
        \Log::error('Erreur lors de la création du devoir : ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la création du devoir.']);
    }
}

public function showdevoir()
    {
        // Récupérer les devoirs créés par le professeur connecté
        $professeurId = Auth::guard('professeur')->user()->id;
        $devoirs = Devoir::where('professeur_id', $professeurId)->get();

        // Passer les devoirs à la vue
        return view('devoir_make.show', compact('devoirs'));
    }

}
