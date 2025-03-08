<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    public function index()
    {
        // Exemple 1 : Récupérer les cours associés à l'utilisateur via une relation
        $user=Auth::user();

        // Obtenir les IDs des cours auxquels l'utilisateur est déjà inscrit
        $inscribedCourseIds = $user->cours()->pluck('cours.id')->toArray();

        // Obtenir les cours auxquels l'utilisateur n'est pas encore inscrit
        $cours = Cour::whereNotIn('id', $inscribedCourseIds)->get();

        return view('devoir.index', compact('cours', 'user'));



}

public function UserCour(Request $request)
{
    $userId = $request->input('userId');

    $courId = $request->input('courId');
    $user=User::findOrfail($userId);
    $user->cours()->attach($courId, [
        'inscription_date' => now(),
        'status' => 'active'
    ]);
    return redirect()->back()->with('success', 'Inscription réussie');
}


// public function coursByCategory(Category $category): View
// {
//     return $this->postsView(['category' => $category]);
// }
}
