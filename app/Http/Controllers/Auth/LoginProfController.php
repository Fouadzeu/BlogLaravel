<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginProfController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:professeur')->except('logout');
        $this->middleware('auth:professeur')->only('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login_professeur');
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('professeur')->attempt($credentials, (bool)$request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::PROFESSEUR_HOME);
        }

        return back()->withErrors([
            'email' => 'Identifiants erronés.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('professeur')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
