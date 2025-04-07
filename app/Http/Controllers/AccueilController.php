<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class AccueilController extends Controller
{
    public function index(){

    return view('accueil.index');

    }
}
