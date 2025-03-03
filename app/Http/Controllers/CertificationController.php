<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        // Récupérer les certifications de l'utilisateur connecté
        $certifications = Certification::where('user_id', Auth::id())->get();
        return view('certifications.index', compact('certifications'));
    }
}
