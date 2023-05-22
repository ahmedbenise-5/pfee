<?php


namespace App\Repositories;

use App\Models\Etudiants;

class  FraisTraitementRepository  implements FraisTraitementRepositoryInterface {


    public function index(){

    }
    public function create($id){

    }
    public function show($id){

        $Etudiants = Etudiants::FindOrFail($id);
        return view('FraisTraitement.add',compact('Etudiants'));

    }
    public function edit($id){

    }
    public function update($request){

    }
    public function store($request){

    }
    public function destroy($request){
        
    }




}