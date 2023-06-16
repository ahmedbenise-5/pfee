<?php

namespace App\Repositories;

use App\Models\Frais;
use App\Models\facture;
use App\Models\Etudiants;
use App\Models\CompteEtudiant;
use App\Models\niveauxdetudes;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use PDF;

class FactureRepository implements  FactureRepositoryInterface{



    public function index(){

        $facture = facture::all();
        $niveauxdetudes=niveauxdetudes::all();
        return view('Facture.index',compact('facture','niveauxdetudes'));

    }
    

    public function show($id){

        $etudaint = Etudiants::findOrFail($id);
        $frais = Frais::where('id_classes',$etudaint->id_classes)->get();
        // dd($frais);

        return view('Facture.facture_add',compact('etudaint','frais'));
    }

    public function getmontante($id){

        $montante= Frais::where('id',$id)->pluck('montante','id');
        // dd($montante);
        return $montante;

    }

    public function store($request)
    {

        // dd($request);

        try {
            // Begin a transaction
            DB::beginTransaction();

            $facture = new facture();
            $facture->date_facture= $request->date_facture;
            $facture->id_frais= $request->type_frais;
            $facture->id_etudiant= $request->id_etudiant;
            $facture->id_niveauxdetudes= $request->id_niveauxdetudes;
            $facture->id_classes= $request->id_classes;
            $facture->montante= $request->montante;
            $facture->description= $request->description;
            $facture->save();



            $CompteEtudiant = new CompteEtudiant();
            $CompteEtudiant->facture_id= $facture->id;
            $CompteEtudiant->type_facture= 'Facture';
            $CompteEtudiant->date= date('Y-m-d');
            $CompteEtudiant->id_etudiant= $request->id_etudiant;
            $CompteEtudiant->Debit= $request->montante;
            $CompteEtudiant->credit= 0.00;
            $CompteEtudiant->description= $request->description;
            $CompteEtudiant->save();


            // Commit the transaction
            DB::commit();

            toastr()->success('Les données ont été enregistrées avec succès !');
            return redirect()->route("facture.index");

        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();            
            throw $e;
        }

    }


    public function edit($id){
        $facture = facture::findOrFail($id);
        $frais = Frais::where('id_classes',$facture->id_classes)->get();
        // dd($facture);

        return view('Facture.edit',compact('facture','frais')); 
       }


       public function update($request)
       {

        try {
            // Begin a transaction
            DB::beginTransaction();

            $facture = facture::where('id',$request->id)->first();
            $facture->id_frais= $request->type_frais;
            $facture->montante= $request->montante;
            $facture->description= $request->description;
            $facture->save();



            $CompteEtudiant =CompteEtudiant::where('facture_id',$facture->id)->first();
            $CompteEtudiant->facture_id= $facture->id;
            $CompteEtudiant->Debit= $request->montante;
            $CompteEtudiant->credit= 0.00;
            $CompteEtudiant->description= $request->description;
            $CompteEtudiant->save();


            // Commit the transaction
            DB::commit();
            toastr()->success('Les données ont été modifer avec succès !');
            return redirect()->route("facture.index");

        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();            
            throw $e;
        }
    }


    public function destroy($request)
    {
        $facture = facture::where('id',$request->id)->first();
        $facture->delete();
        toastr()->success('Les données ont été supprimées avec succès');
            return redirect()->route("facture.index");
    }


    public function facture_pdf($id){
        $facture = facture::where('id',1)->first();
        // dd($Frais);
      
        $pdf = PDF::loadView('Facture.myPDF', compact('facture'))->setPaper(array(0, 0, 400, 600), 'landscape');
    
        return $pdf->stream('Facture.pdf');
    }


}

