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



    public function Get_genders(){

       return genders::all();
        
    }
 
    public function Get_niveauxdetudes(){

       return niveauxdetudes::all();
        
    }

    public function Get_Classes(){

       return Classes::all();
        
    }
    public function Get_Sections(){

       return Sections::all();
        
    }
 
    public function Get_Parentes(){

       return Parentes::all();
        
    }
 
    public function Get_Religion(){

       return Religion::all();
        
    }
    public function Get_Nationalitie(){

       return Nationalitie::all();
        
    }

    public function getclasses($id){

        $list_classes= Classes::where('Niveauxdetudes_id',$id)->pluck('Nom_Classe','id');
        return $list_classes;
    }
 

    // public function create_etudiant(){
    //     $genders = genders::all();
    //     $niveauxdetudes=niveauxdetudes::all();
    //     $Classes=Classes::all();
    //     $Sections=Sections::all();
    //     $Parentes=Parentes::all();
    //     $Religion=Religion::all();
    //     $Nationalitie=Nationalitie::all();
    //     return view('Etudiants.craete',compact('genders','niveauxdetudes','Classes' ,'Sections','Parentes','Religion','Nationalitie'));
    // }

}
