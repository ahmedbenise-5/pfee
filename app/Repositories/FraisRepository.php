<?php


namespace App\Repositories;
use App\Models\niveauxdetudes;




class  FraisRepository implements FraisRepositoryInterface {


    public function index()
    {
        return view('Frais.index');
    }

    public function create(){

        $list_niveauxdetudes =  niveauxdetudes::all();

        return view('Frais.craete', compact('list_niveauxdetudes'));

    }

    public function store($request){

        dd($request);

    }




}
