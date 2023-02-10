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

    public function __construct(EnseignantsRepositoryInterface $EnseignantsRepository )
    {
        $this->Enseignants = $EnseignantsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list_enseignants = $this->Enseignants->getAlleEnseignants();
        $list_genders=$this->Enseignants->getAlleGender();
        $list_specialisation=$this->Enseignants->getAlleSpecialisation();
        return view('Enseignants.index',compact('list_enseignants' ,'list_genders','list_specialisation'));


    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        return $this->Enseignants->StoreEnseignants($request);


    }


    public function show(Enseignants $enseignants)
    {
        //
    }


    public function edit(Enseignants $enseignants)
    {
        //
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
