<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Devoir;
use App\Models\Resultat;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function __construct(){
        $this->middleware('auth');


    }


    /**
     * Display a listing of the resource.
     */

    public function dashboard()
    {
        $users = User::all();
        $devoirs = Devoir::all();
        $soumissions = Resultat::all();
        return view('admin.dashboard', compact('users', 'devoirs', 'resultats'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Devoir $devoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Devoir $devoir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Devoir $devoir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Devoir $Devoir)
    {
        //
    }
}
