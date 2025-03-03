<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    public function index()
    {
        // Exemple 1 : Récupérer les cours associés à l'utilisateur via une relation
        $user = Auth::user();
        $cours = $user->cours; // Assurez-vous que la relation existe dans le modèle User.

        // Exemple 2 (si vous souhaitez afficher tous les cours) :
        // $courses = \App\Models\Course::all();

        return view('cours.index', compact('cours'));



}

// public function coursByCategory(Category $category): View
// {
//     return $this->postsView(['category' => $category]);
// }
}
