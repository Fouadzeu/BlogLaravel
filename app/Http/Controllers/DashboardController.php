<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Devoir;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $specialiteId = $user->specialite_id;

        $devoirs = Devoir::where('specialite_id', $specialiteId)->with('professeur')->get();
        $nbDevoirsGeneres = $devoirs->count();
        $devoirsEnCours = $devoirs->where('date_fin', '>', now())->count();
        $devoirsTermines = $devoirs->where('date_fin', '<=', now())->count();

        // Récupérer les trois devoirs les plus récents
        $activitesRecentes = Devoir::where('specialite_id', $specialiteId)
                            ->with('professeur')
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();

        return view('accueil.user_dashboard', compact('devoirs', 'nbDevoirsGeneres', 'devoirsEnCours', 'devoirsTermines', 'activitesRecentes'));
    }

    public function indexprof()
    {
        // Récupérer l'ID du professeur connecté
        $professeurId = Auth::user()->id;

        // Récupérer les devoirs du professeur connecté avec leur professeur
        $devoirs = Devoir::with('professeur')
                         ->where('professeur_id', $professeurId)
                         ->get();

        // Calculer le nombre total de devoirs générés par le professeur
        $nbDevoirsGeneres = $devoirs->count();

        // Calculer le nombre de devoirs en cours (date_fin > maintenant)
        $devoirsEnCours = $devoirs->where('date_fin', '>', now())->count();

        // Calculer le nombre de devoirs terminés (date_fin <= maintenant)
        $devoirsTermines = $devoirs->where('date_fin', '<=', now())->count();

        // Récupérer les 3 derniers devoirs créés par le professeur connecté
        $activitesRecentes = Devoir::with('professeur')
                                   ->where('professeur_id', $professeurId)
                                   ->orderBy('created_at', 'desc')
                                   ->take(3)
                                   ->get();

        // Retourner la vue avec les données filtrées
        return view('accueil.prof_dashboard', compact('devoirs', 'nbDevoirsGeneres', 'devoirsEnCours', 'devoirsTermines', 'activitesRecentes'));
    }
}
