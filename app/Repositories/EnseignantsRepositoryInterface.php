<?php


namespace App\Repositories;


interface EnseignantsRepositoryInterface {

    public function getAlleEnseignants();
    public function getAlleGender();
    public function getAlleSpecialisation();
    // StoreTeachers
    public function StoreEnseignants($request);

}
