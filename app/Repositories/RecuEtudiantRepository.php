<?php


namespace App\Repositories;

use App\Models\Etudiants;
use App\Models\RecuEtudiant;
use App\Models\CompteEtudiant;
use App\Models\Comptefinancier;
use Illuminate\Support\Facades\DB;

class RecuEtudiantRepository implements RecuEtudiantRepositoryInterface
{




    public function index()
    {
    }

    public function show($id)
    {

        $etudaint = Etudiants::FindOrFail($id);
        return view('RecuEtudaint.addRecu', compact('etudaint'));
    }

    public function edit($id)
    {
    }

    public function update($request)
    {
    }

    public  function store($request)
    {

        // dd($request);

        try {
            // Begin a transaction
            DB::beginTransaction();

            // insert in recu etudain 
            $recuEtudaint = new RecuEtudiant();
            $recuEtudaint->date = date('Y-m-d');
            $recuEtudaint->Etudaint_id =$request->id_etudiant;
            $recuEtudaint->Debit= $request->montante;
            $recuEtudaint->description= $request->description;
            $recuEtudaint->save();

            // insert in compteFinnace
            $Comptefinancier = new Comptefinancier();
            $Comptefinancier->date= date('Y-m-d');
            $Comptefinancier->id_recuEtudaint= $recuEtudaint->id;
            $Comptefinancier->debit= $request->montante;
            $Comptefinancier->credit= 0;
            $Comptefinancier->description=$request->description;
            $Comptefinancier->save();

            // insert in compte etudaint
            $CompteEtudiant = new CompteEtudiant();
            $CompteEtudiant->date =date('Y-m-d');
            $CompteEtudiant->type_facture = 'recu paiment';
            $CompteEtudiant->id_etudiant=  $request->id_etudiant;
            $CompteEtudiant->id_recuEtudaint=  $recuEtudaint->id;
            $CompteEtudiant->Debit=  0;
            $CompteEtudiant->credit=  $request->montante;
            $CompteEtudiant->description=  $request->description;
            $CompteEtudiant->save();
            
            // Commit the transaction
            DB::commit();

            toastr()->success('Les données ont été enregistrées avec succès !');
            return redirect()->route("RecuEtudaint.index");

        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            throw $e;
        }
    }

    public function destroy($request)
    {
    }
}
