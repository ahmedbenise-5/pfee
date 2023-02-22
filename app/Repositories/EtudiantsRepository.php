<?php

namespace App\Repositories;

use App\Models\Classes;
use App\Models\genders;
use App\Models\Nationalitie;
use App\Models\niveauxdetudes;
use App\Models\Parentes;
use App\Models\Religion;
use App\Models\Sections;

class  EtudiantsRepository implements EtudiantsRepositoryInterface
{



    public function create_etudiant(){
        $genders = genders::all();
        $niveauxdetudes=niveauxdetudes::all();
        $Classes=Classes::all();
        $Sections=Sections::all();
        $Parentes=Parentes::all();
        $Religion=Religion::all();
        $Nationalitie=Nationalitie::all();
        return view('Etudiants.craete',compact('genders','niveauxdetudes','Classes' ,'Sections','Parentes','Religion','Nationalitie'));
    }

}
