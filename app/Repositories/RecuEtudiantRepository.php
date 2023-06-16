<?php


namespace App\Repositories;

use App\Models\Etudiants;
use App\Models\RecuEtudiant;
use App\Models\CompteEtudiant;
use App\Models\Comptefinancier;
use Illuminate\Support\Facades\DB;
use PDF;


class RecuEtudiantRepository implements RecuEtudiantRepositoryInterface
{




    public function index()
    {
        $recuEtudaints = RecuEtudiant::all();
        return view('RecuEtudaint.index',compact('recuEtudaints'));
    }

    public function show($id)
    {

        $etudaint = Etudiants::FindOrFail($id);
        return view('RecuEtudaint.addRecu', compact('etudaint'));
    }

    public function edit($id)
    {
     $recuEtudaints = RecuEtudiant::FindOrFail($id);
     
     return view('RecuEtudaint.edit',compact('recuEtudaints'));

    }

    public function update($request)
    {
        try {
            // Begin a transaction
            DB::beginTransaction();

            // insert in recu etudain 
            $recuEtudaint =RecuEtudiant::where('id',$request->id)->first();
            $recuEtudaint->date = date('Y-m-d');
            $recuEtudaint->Etudaint_id =$request->id_etudiant;
            $recuEtudaint->Debit= $request->montante;
            $recuEtudaint->description= $request->description;
            $recuEtudaint->save();

            // insert in compteFinnace
            $Comptefinancier =Comptefinancier::where('id_recuEtudaint',$request->id)->first();
            $Comptefinancier->date= date('Y-m-d');
            $Comptefinancier->id_recuEtudaint= $recuEtudaint->id;
            $Comptefinancier->debit= $request->montante;
            $Comptefinancier->credit= 0;
            $Comptefinancier->description=$request->description;
            $Comptefinancier->save();

            // insert in compte etudaint
            $CompteEtudiant = CompteEtudiant::where('id_recuEtudaint',$request->id)->first();
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

            toastr()->success('Les données ont été modifier avec succès !');
            return redirect()->route("RecuEtudaint.index");

        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            throw $e;
        }
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

        $recuEtudaint = RecuEtudiant::where('id',$request->id)->delete();
        toastr()->success('Les données ont été supprimer avec succès !');
        return redirect()->route("RecuEtudaint.index");
    }

    public function paiement_pdf($id){

        $paiement = RecuEtudiant::where('id',$id)->first();
        $etudaint = Etudiants::where('id' ,$paiement->Etudaint_id)->first();

        // dd($etudaint->Classes->Nom_Classe);
        // dd( $paiement->description );

        $pdf = PDF::loadView('RecuEtudaint.myPaiemnt', compact('paiement','etudaint'))->setPaper(array(0, 0, 400, 600), 'landscape');
    
        return $pdf->stream('RecuEtudaint.pdf');
        
          
    }


}

