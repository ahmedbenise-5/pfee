<?php


namespace App\Repositories;

use GuzzleHttp\Psr7\Request;

interface  EtudiantsRepositoryInterface {




    public function  Get_genders();
    public function  Get_Classes();
    public function  Get_Sections();
    public function  Get_Parentes();
    public function  Get_Religion();
    public function  Get_Nationalitie();
    public function  Get_niveauxdetudes();

    public function getclasses($id);
    public function getsections($id);


    //
    public function index();
    //
    public function Add_Etudiants($request);
    //
    public function Update_Etudiants($request);
    //
    public function Delete_Etudiants($request);





}
