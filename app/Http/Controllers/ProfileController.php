<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $user=Auth::user();

        return view('profile.index',compact('user'));
    }
    public function indexProf()
    {
        $prof=Auth::guard('professeur')->user();
        return view('profile.index_prof',compact('prof'));
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => [
                'required',
                'string',
                function (string $attribute, mixed $value, Closure $fail) use ($user) {
                    if (! Hash::check($value, $user->password)) {
                        $fail("Le :attribué est erroné.");
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('statuts','Mot de passe modifié');
    }

    public function updatePasswordProf(Request $request): RedirectResponse
    {
        $prof = Auth::guard('professeur')->user();

        $validated = $request->validate([
            'current_password' => [
                'required',
                'string',
                function (string $attribute, mixed $value, Closure $fail) use ($prof) {
                    if (! Hash::check($value, $prof->password)) {
                        $fail("Le :attribute est erroné.");
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $prof->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('statuts','Mot de passe modifié');
    }

    public function updateEmail(Request $request)
    {
        $user= Auth::user();
        $validated=$request->validate(['email'=>['required','confirmed']]);
        $useremail= User::all();
        foreach($useremail as $email){

            if($validated['email']==$email->email){
                return redirect()->back()->with('error','email deja utilisé');
            }
        }
        $profemail= Professeur::all();
        foreach($profemail as $email){

            if($validated['email']==$email->email){
                return redirect()->back()->with('error','email deja utilisé');
            }
        }

        $user->update($validated);
        return redirect()->back()->with('statuts','email modifié');
    }


    public function updateEmailProf(Request $request)
    {
        $prof= Auth::guard('professeur')->user();
        $validated=$request->validate(['email'=>['required','confirmed']]);
        $useremail= User::all();
        foreach($useremail as $email){

            if($validated==$email->email){
                return redirect()->back()->with('error','email deja utilisé');
            }
        }
        $profemail= Professeur::all();
        foreach($profemail as $email){

            if($validated==$email->email){
                return redirect()->back()->with('error','email deja utilisé');
            }
        }
        $prof->update($validated);

        return redirect()->back()->with('statuts','email modifié');
    }

}
