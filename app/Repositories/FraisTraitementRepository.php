<?php


namespace App\Repositories;

use App\Models\Etudiants;
use App\Models\RecuEtudiant;
use App\Models\CompteEtudiant;
use App\Models\Comptefinancier;
use App\Models\FraisTraitement;
use Illuminate\Support\Facades\DB;

class  FraisTraitementRepository  implements FraisTraitementRepositoryInterface {


    public function index(){

        $FraisTraitements = FraisTraitement::all();
        return view('FraisTraitement.index',compact('FraisTraitements'));

    }
    public function create($id){

    }
    public function show($id){

        $Etudiants = Etudiants::FindOrFail($id);
        return view('FraisTraitement.add',compact('Etudiants'));

    }
    public function edit($id){

        $FraisTraitements = FraisTraitement::FindOrFail($id)->first();
        return view('FraisTraitement.edit',compact('FraisTraitements'));

    }
    public function update($request){

        
        try {
            // Begin a transaction
            DB::beginTransaction();

            // update in FraisTraitement 
            $FraisTraitement =FraisTraitement::where("id",$request->id)->first();
            $FraisTraitement->date = date('Y-m-d');
            $FraisTraitement->Etudaint_id =$request->Etudaint_id;
            $FraisTraitement->Debit= $request->montante;
            $FraisTraitement->description= $request->description;
            $FraisTraitement->save();

            // upadte in compte etudaint
            $CompteEtudiant =CompteEtudiant::where("id_fraistraitements",$FraisTraitement->id)->first();
        //   dd($CompteEtudiant);
            $CompteEtudiant->date =date('Y-m-d');
            $CompteEtudiant->type_facture = 'FraisTraitement';
            $CompteEtudiant->id_etudiant=  $request->Etudaint_id;
            $CompteEtudiant->id_fraistraitements=  $FraisTraitement->id;
            $CompteEtudiant->Debit=  0;
            $CompteEtudiant->credit= $request->montante;
            $CompteEtudiant->description=  $request->description;
            $CompteEtudiant->save();
            
            // Commit the transaction
            DB::commit();

            toastr()->success('Les données ont été enregistrées avec succès !');
            return redirect()->route("FraisTraitement.index");

        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            throw $e;
        }

    }

    public function store($request){

        try {
            // Begin a transaction
            DB::beginTransaction();

            // insert in recu etudain 
            $FraisTraitement = new FraisTraitement();

            $FraisTraitement->date = date('Y-m-d');
            $FraisTraitement->Etudaint_id =$request->id_etudiant;
            $FraisTraitement->Debit= $request->montante;
            $FraisTraitement->description= $request->description;
            $FraisTraitement->save();
            // dd($FraisTraitement);
            // insert in compte etudaint
            $CompteEtudiant = new CompteEtudiant();
            $CompteEtudiant->date =date('Y-m-d');
            $CompteEtudiant->type_facture = 'FraisTraitement';
            $CompteEtudiant->id_etudiant=  $request->id_etudiant;
            $CompteEtudiant->id_fraistraitements=  $FraisTraitement->id;
            $CompteEtudiant->Debit=  0;
            $CompteEtudiant->credit=  $request->montante;
            $CompteEtudiant->description=  $request->description;
            $CompteEtudiant->save();
            
            // Commit the transaction
            DB::commit();

            toastr()->success('Les données ont été enregistrées avec succès !');
            return redirect()->route("FraisTraitement.index");

        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            throw $e;
        }

    }
    public function destroy($request){

        $FraisTraitement = FraisTraitement::where('id',$request->id)->delete();
        toastr()->success('Les données ont été supprimer avec succès !');
        return redirect()->route("FraisTraitement.index");
        
    }




}