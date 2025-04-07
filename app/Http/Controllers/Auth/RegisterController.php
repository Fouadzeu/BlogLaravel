<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Professeur;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller

{
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        $specialites=Specialite::all();

        return view('auth.register',compact("specialites"));
    }
    public function showProfesseurRegistrationForm()
    {

        return view('auth.register_professeur');
    }
    public function register(Request $request)
    {
        $validated=$request->validate([
            'name'=>['required','string','between:5,255'],
            'specialite_id'=>['required'],
            'email'=>['required','email','unique:users'],
            'password'=>['required','string','min:8','confirmed'],
            ]);

            $validated['password']=Hash::make($validated['password']);

            $user=User::create($validated);

            Auth::login($user);

            return redirect()->route('user.dashboard')->with('statuts','Inscription Reussi');
    }

    public function registerProfesseur(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required', 'string', 'between:5,255'],
            'email' => ['required', 'email', 'unique:professeurs'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'code_prof'=>['required']
        ]);

        if ($validated['code_prof'] !== '123456789') {
            return back()->withErrors(['code_prof' => 'Le code professeur est incorrect.']);
        }

        $validated['password'] = Hash::make($validated['password']);

        $professeur = Professeur::create($validated);

        Auth::login($professeur);

        return redirect()->route('professeur.dashboard')->with('status', 'Inscription Réussie');
    }
}
