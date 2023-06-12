<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\genders;
use App\Models\Enseignants;
use App\Models\specializations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class  EnseignantsRepository  implements EnseignantsRepositoryInterface
{


    public function getAlleEnseignants()
    {

        return  Enseignants::all();
    }
    public function getAlleGender()
    {

        return  genders::all();
    }
    public function getAlleSpecialisation()
    {

        return  specializations::all();
    }





    public function StoreEnseignants($request)
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:enseignants,email',
            // 'Password' => 'required| min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'password' => 'required',
            'Nom_enseignants' => 'required',
            'Genders_id' => 'required',
            'specializations_id' => 'required',
            'Date_join' => 'required',
            'Statut' => 'required',
            'Adress' => 'required',
            'niveaux_etudes' => 'required',

        ], []);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $Enseignants = new Enseignants();
        $Enseignants->Nom_enseignants = $request->Nom_enseignants;
        $Enseignants->email = $request->email;
        $Enseignants->password = Hash::make($request->password);
        $Enseignants->Genders_id = $request->Genders_id;
        $Enseignants->specializations_id = $request->specializations_id;
        $Enseignants->niveaux_etudes = $request->niveaux_etudes;
        $Enseignants->Date_join = $request->Date_join;
        $Enseignants->Statut = $request->Statut;
        $Enseignants->Adress = $request->Adress;
        $Enseignants->save();

         // craetion users 
         $users = new User();
         $users->email=$request->email;
         $users->password=bcrypt($request->password);
         $users->name=$request->Nom_enseignants;
         $users->statut= 1;
         $users->assignRole(3);
         $users->save();
         $Enseignants->user_id=$users->id;
         $Enseignants->save();

        toastr()->success('Data has been saved successfully!');
        return redirect()->back();

    }


    public function UpdateEnseignants($request)
    {



        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:enseignants,email,' . $request->id,
            // 'Password' => 'required| min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'password' => 'required',
            'Nom_enseignants' => 'required',
            'Genders_id' => 'required',
            'specializations_id' => 'required',
            'Date_join' => 'required',
            'Statut' => 'required',
            'Adress' => 'required',
            'niveaux_etudes' => 'required',

        ], []);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $Enseignants = Enseignants::findOrFail($request->id);
        $Enseignants->Nom_enseignants = $request->Nom_enseignants;
        $Enseignants->email = $request->email;
        $Enseignants->password = Hash::make($request->password);
        $Enseignants->Genders_id = $request->Genders_id;
        $Enseignants->specializations_id = $request->specializations_id;
        $Enseignants->Date_join = $request->Date_join;
        $Enseignants->niveaux_etudes = $request->niveaux_etudes;
        $Enseignants->Statut = $request->Statut;
        $Enseignants->Adress = $request->Adress;
        $Enseignants->save();


        $users = User::where('id',$Enseignants->user_id)->first();
        $users->email=$request->email;
        $users->password=bcrypt($request->password);
        $users->statut= 1;
        $users->name=$Enseignants->Nom_enseignants;
        DB::table('model_has_roles')->where('model_id',$Enseignants->user_id)->delete();
        $users->assignRole(3);
        $users->save();

        $Enseignants->user_id=$users->id;
        $Enseignants->save();

        toastr()->success('Data has been update successfully!');
        return redirect()->back();
    }




    public function DeleteEnseignants($request)
    {

        Enseignants::findOrFail($request->id)->delete();
        toastr()->error('Enseignant ont été supprimées avec succès !');
        return redirect()->back();
    }
}
