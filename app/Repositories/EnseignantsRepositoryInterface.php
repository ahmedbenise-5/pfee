<?php


namespace App\Repositories;


interface EnseignantsRepositoryInterface {

    public function getAlleEnseignants();
    public function getAlleGender();
    public function getAlleSpecialisation();

    // Store Enseignants
    public function StoreEnseignants($request);

    // upadte Enseignants
    public function UpdateEnseignants($request);

    // delete Enseignants
    public function DeleteEnseignants($request);

}
