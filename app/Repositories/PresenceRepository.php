<?php

namespace App\Repositories;

use App\Models\Presence;
use App\Models\Etudiants;
use App\Models\Enseignants;
use App\Models\niveauxdetudes;
use App\Models\Sections;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PresenceRepository implements PresenceRepositoryInterface
{

    public function index()
    {
    }
    public function create($id)
    {
    }
    public function show($id)
    {
        $Etudiants = Etudiants::with('Presence')->where('id_sections', $id)->get();
        return view('Presence.show', compact('Etudiants'));
    }
    public function edit($id)
    {
    }
    public function update($request)
    {
    }
    public function store($request)
    {
        try {

            // id_enseignants
            $id_enseignants_section =Sections::where('id',$request->id_sections)->get()->pluck('enseignant_id');
             
            $var1 = Auth()->id();
            $var2 = $id_enseignants_section->toArray();
            if(in_array($var1 ,$var2 )){
             $id_enseignants =  Auth()->id();
            } else{
                return redirect()
                ->back()
                ->withErrors("Vous n'avez pas le droit d'ajouter une absence")
                ->withInput();

            } 
            
            // date presnces 
            $presences_date = date('Y-m-d');
            //insert in table presences
            foreach ($request->presnces as $id_etudiant => $presnce) {


                // $presences_status = '';
                if ($presnce == "present") {
                    $presences_status = true;
                } elseif ($presnce == "absent") {
                    $presences_status = false;
                }

                $presnce = new Presence();
                $presnce->id_etudiant= $id_etudiant;
                $presnce->id_niveauxdetudes = $request->id_niveauxdetudes;
                $presnce->id_classes = $request->id_classes;
                $presnce->id_sections = $request->id_sections;
                $presnce->presences_date =$presences_date;
                $presnce->presences_status =$presences_status;
                $presnce->id_enseignants =id_enseignants;
                $presnce->save();
            }
            toastr()->success('Data has been saved successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            throw $e;
        }
    }
    public function destroy($request)
    {
    }
    public function Primaire_index()
    {

        $niveauetudes = niveauxdetudes::with(['Sections'])->where('Nom', 'Primaire')->first();
        $list_niveauetudes = niveauxdetudes::all();
        $enseignants = Enseignants::all();
        return view('Presence.primaire', compact('list_niveauetudes', 'niveauetudes', 'enseignants'));
    }
    public function Lycee_index()
    {
        $niveauetudes = niveauxdetudes::with(['Sections'])->where('Nom', 'Lycee')->first();
        $list_niveauetudes = niveauxdetudes::all();
        $enseignants = Enseignants::all();
        return view('Presence.primaire', compact('list_niveauetudes', 'niveauetudes', 'enseignants'));
    }
    public function College_index()
    {
        $niveauetudes = niveauxdetudes::with(['Sections'])->where('Nom', 'College')->first();
        $list_niveauetudes = niveauxdetudes::all();
        $enseignants = Enseignants::all();
        return view('Presence.primaire', compact('list_niveauetudes', 'niveauetudes', 'enseignants'));
    }
}
