<?php

namespace App\Repositories;

use App\Models\Enseignants;
use App\Models\genders;
use App\Models\specializations;
use Illuminate\Support\Facades\Hash;

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




        }


}

