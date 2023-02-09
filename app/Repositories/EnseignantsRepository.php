<?php

namespace App\Repositories;

use App\Models\genders;
use App\Models\Enseignants;
use App\Models\specializations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class  EnseignantsRepository  implements  EnseignantsRepositoryInterface {


        public function getAlleEnseignants(){

            return  Enseignants::all();
        }
        public function getAlleGender(){

            return  genders::all();
        }
        public function getAlleSpecialisation(){

            return  specializations::all();
        }

        public function StoreEnseignants($request){


            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:parentes,email',
                // 'Password' => 'required| min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'password' => 'required',
                'Nom_enseignants' => 'required',
                'Genders_id' => 'required',
                'specializations_id' =>'required',
                'Date_join' => 'required',
                'Statut' => 'required',
                'Adress' => 'required',

            ],[


            ]);
            if ($validator->fails()) {
                return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
            }

                $Enseignants =new Enseignants();
                $Enseignants->Nom_enseignants= $request->Nom_enseignants;
                $Enseignants->email= $request->email;
                $Enseignants->password= Hash::make($request->password);
                $Enseignants->Genders_id= $request->Genders_id;
                $Enseignants->specializations_id= $request->specializations_id;
                $Enseignants->Date_join= $request->Date_join;
                $Enseignants->Statut= $request->Statut;
                $Enseignants->Adress= $request->Adress;
                $Enseignants->save();

                toastr()->success('Data has been saved successfully!');
                return redirect()->route('parentes.index');



        }


}

