<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller


{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();

        return view('accueil.user_dashboard',compact('user'));
    }

    public function indexprof()
    {
        $prof=Auth::professeur();
        return view('accueil.prof_dashboard',compact('prof'));
    }
}
