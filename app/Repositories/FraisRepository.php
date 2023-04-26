<?php


namespace App\Repositories;

use App\Models\Classes;
use App\Models\Frais;
use App\Models\niveauxdetudes;




class  FraisRepository implements FraisRepositoryInterface {


    public function index()
    {

        $Frais = Frais::all();
        return view('Frais.index',compact('Frais'));
    }

    public function create(){

        $list_niveauxdetudes =  niveauxdetudes::all();

        return view('Frais.craete', compact('list_niveauxdetudes'));

    }



    public function edit($id){

        $list_niveauxdetudes =  niveauxdetudes::all();
        $list_classes =  Classes::all();
        $Frais=Frais::where('id',$id)->first();
        // dd($Frais);

        return view('Frais.edit', compact('Frais','list_niveauxdetudes','list_classes'));

    }



    public function store($request){

       $Frais = new Frais();
       $Frais->titer = $request->titer;
       $Frais->montante = $request->montante;
       $Frais->id_niveauxdetudes = $request->id_niveauxdetudes;
       $Frais->id_classes = $request->id_classes;
       $Frais->description = $request->description;
       $Frais->annee = $request->annee;
       $Frais->save();
       toastr()->success('Data has been update successfully!');
       return redirect()->back();
    }




}
