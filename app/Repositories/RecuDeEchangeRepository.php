<?php

namespace App\Repositories;

use App\Models\Etudiants;
use App\Models\RecuDeEchange;
use App\Models\CompteEtudiant;
use App\Models\Comptefinancier;
use Illuminate\Support\Facades\DB;

class RecuDeEchangeRepository  implements RecuDeEchangeRepositoryInterface
{

    public function index()
    {
        $RecuDeEchange = RecuDeEchange::all();
        return view('RecuDeEchange.index',compact('RecuDeEchange'));
    }
    public function create($id)
    {
    }
    public function show($id)
    {

        $Etudiants = Etudiants::FindOrFail($id)->first();
        return view('RecuDeEchange.add', compact('Etudiants'));
    }
    public function edit($id)
    {
        $RecuDeEchange = RecuDeEchange::where('id',$id)->first();
        return view('RecuDeEchange.edit',compact('RecuDeEchange'));

    }
    public function update($request)
    {

        try {
            // Begin a transaction
            DB::beginTransaction();

            // insert in recu etudain 
            $RecuDeEchange = RecuDeEchange::where('id',$request->id)->first();
            $RecuDeEchange->date = date('Y-m-d');
            $RecuDeEchange->Etudaint_id = $request->Etudaint_id;
            $RecuDeEchange->Debit = $request->montante;
            $RecuDeEchange->description = $request->description;
            $RecuDeEchange->save();
            // dd($FraisTraitement);

            // insert in compteFinnace
            $Comptefinancier =Comptefinancier::where('id_recuechanges',$request->id)->first();
            $Comptefinancier->date = date('Y-m-d');
            $Comptefinancier->id_recuechanges = $RecuDeEchange->id;
            $Comptefinancier->debit = 0;
            $Comptefinancier->credit = $request->montante;
            $Comptefinancier->description = $request->description;
            $Comptefinancier->save();

            // insert in compte etudaint
            $CompteEtudiant =  CompteEtudiant::where('id_recuechanges',$request->id)->first();
            $CompteEtudiant->date = date('Y-m-d');
            $CompteEtudiant->type_facture = 'Recu De Echange';
            $CompteEtudiant->id_etudiant =  $request->Etudaint_id;
            $CompteEtudiant->id_recuechanges =  $RecuDeEchange->id;
            $CompteEtudiant->Debit = $request->montante;
            $CompteEtudiant->credit =  0;
            $CompteEtudiant->description =  $request->description;
            $CompteEtudiant->save();

            // Commit the transaction
            DB::commit();

            toastr()->success('Les données ont été modifier avec succès !');
            return redirect()->route("RecuDeEchange.index");
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            throw $e;
        }
    }

    public function store($request)
    {
        try {
            // Begin a transaction
            DB::beginTransaction();

            // insert in recu etudain 
            $RecuDeEchange = new RecuDeEchange();
            $RecuDeEchange->date = date('Y-m-d');
            $RecuDeEchange->Etudaint_id = $request->id_etudiant;
            $RecuDeEchange->Debit = $request->montante;
            $RecuDeEchange->description = $request->description;
            $RecuDeEchange->save();
            // dd($FraisTraitement);

            // insert in compteFinnace
            $Comptefinancier = new Comptefinancier();
            $Comptefinancier->date = date('Y-m-d');
            $Comptefinancier->id_recuechanges = $RecuDeEchange->id;
            $Comptefinancier->debit = 0;
            $Comptefinancier->credit = $request->montante;
            $Comptefinancier->description = $request->description;
            $Comptefinancier->save();

            // insert in compte etudaint
            $CompteEtudiant = new CompteEtudiant();
            $CompteEtudiant->date = date('Y-m-d');
            $CompteEtudiant->type_facture = 'Recu De Echange';
            $CompteEtudiant->id_etudiant =  $request->id_etudiant;
            $CompteEtudiant->id_recuechanges =  $RecuDeEchange->id;
            $CompteEtudiant->Debit = $request->montante;
            $CompteEtudiant->credit =  0;
            $CompteEtudiant->description =  $request->description;
            $CompteEtudiant->save();

            // Commit the transaction
            DB::commit();

            toastr()->success('Les données ont été enregistrées avec succès !');
            return redirect()->route("RecuDeEchange.index");
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            throw $e;
        }
    }


    public function destroy($request){

        $RecuDeEchange = RecuDeEchange::FindOrFail($request->id)->delete();
        toastr()->success('Les données ont été supprimer avec succès !');
        return redirect()->route("RecuDeEchange.index");
        
    }






}
