<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Enseignants;

use App\Models\Enseignants;
use Illuminate\Http\Request;
use App\Repositories\EnseignantsRepositoryInterface;
use App\Http\Controllers\Controller;



class EnseignantsController extends Controller
{
    protected $Enseignants;
    protected $Gender;
    protected $Specialisation;

    public function __construct(EnseignantsRepositoryInterface $EnseignantsRepository)
    {
        $this->Enseignants = $EnseignantsRepository;
    }

    public function index()
    {
        $list_enseignants = $this->Enseignants->getAlleEnseignants();
        $list_genders = $this->Enseignants->getAlleGender();
        $list_specialisation = $this->Enseignants->getAlleSpecialisation();
        return view('Enseignants.index', compact('list_enseignants', 'list_genders', 'list_specialisation'));
    }

    public function store(Request $request)
    {

        return $this->Enseignants->StoreEnseignants($request);
    }

    public function update(Request $request)
    {

        return $this->Enseignants->UpdateEnseignants($request);
    }


    public function destroy(Request $request)
    {
        return $this->Enseignants->DeleteEnseignants($request);
    }
}
