<?php


namespace App\Repositories;



interface  EtudiantsRepositoryInterface {




    public function  Get_genders();
    public function  Get_Classes();
    public function  Get_Sections();
    public function  Get_Parentes();
    public function  Get_Religion();
    public function  Get_Nationalitie();
    public function  Get_niveauxdetudes();

    public function getclasses($id);

    // public function create_etudiant();




}
