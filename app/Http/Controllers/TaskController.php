<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Récupérer les tâches de l'utilisateur connecté
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }
}
