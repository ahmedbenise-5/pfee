<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Etudiants;


use App\Models\Etudiants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return "aziz";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiants  $etudiants
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiants $etudiants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiants  $etudiants
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiants $etudiants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiants  $etudiants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiants $etudiants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiants  $etudiants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiants $etudiants)
    {
        //
    }
}
