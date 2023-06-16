<?php


namespace App\Repositories;

use App\Models\Frais;
use App\Models\Classes;
use App\Models\facture;
use App\Models\niveauxdetudes;
use Illuminate\Support\Facades\Validator;
use PDF;





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


        $validator = Validator::make($request->all(), [
            'titer' => 'required',
            'montante' => 'required',
            'id_niveauxdetudes' => 'required',
            'id_classes' => 'required',
            'annee' => 'required',
        ], []);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

       $Frais = new Frais();
       $Frais->titer = $request->titer;
       $Frais->montante = $request->montante;
       $Frais->id_niveauxdetudes = $request->id_niveauxdetudes;
       $Frais->id_classes = $request->id_classes;
       $Frais->description = $request->description;
       $Frais->annee = $request->annee;
       $Frais->type_frais = $request->type_frais;
       $Frais->save();
       toastr()->success('Data has been save successfully!');
       return redirect()->back();
    }




    public function update($request, $id){

        $validator = Validator::make($request->all(), [
            'titer' => 'required',
            'montante' => 'required',
            'id_niveauxdetudes' => 'required',
            'id_classes' => 'required',
            'annee' => 'required',
        ], []);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $Frais = Frais::findOrFail($id);
        $Frais->titer = $request->titer;
        $Frais->montante = $request->montante;
        $Frais->id_niveauxdetudes = $request->id_niveauxdetudes;
        $Frais->id_classes = $request->id_classes;
        $Frais->type_frais = $request->type_frais;
        $Frais->description = $request->description;
        $Frais->annee = $request->annee;
        $Frais->save();
        toastr()->success('Data has been update successfully!');
        return redirect()->back();

    }


    public function destroy($request)
    {

        Frais::where('id',$request->id)->delete();
        toastr()->success('Data has been delete successfully!');
        return redirect()->back();
    }

    public function pdf($id){
        $facture = facture::where('id',1)->first();
        // dd($Frais);
      
        $pdf = PDF::loadView('Frais.myPDF', compact('facture'))->setPaper(array(0, 0, 400, 600), 'landscape');
    
        return $pdf->stream('Frais.pdf');
    }









}
