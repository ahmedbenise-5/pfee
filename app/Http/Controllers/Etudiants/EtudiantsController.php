<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Etudiants;


use App\Models\Etudiants;
use Illuminate\Http\Request;
use App\Repositories\EtudiantsRepositoryInterface;
use App\Http\Controllers\Controller;

class EtudiantsController extends Controller
{



    protected $Etudiants;

    public function __construct(EtudiantsRepositoryInterface $EtudiantsRepository )
    {
        $this->Etudiants = $EtudiantsRepository;
    }

    public function index()
    {
    /**public function  Get_genders();
    public function  Get_Classes();
    public function  Get_Sections();
    public function  Get_Parentes();
    public function  Get_Religion();
    public function  Get_Nationalitie(); */

    }


    public function create()
    {


        $list_genders = $this->Etudiants->Get_genders();
        $list_niveauxdetudes = $this->Etudiants->Get_niveauxdetudes();
        $list_classes = $this->Etudiants->Get_Classes();
        $list_sections = $this->Etudiants->Get_Sections();
        $list_parentes = $this->Etudiants->Get_Parentes();
        $list_religions = $this->Etudiants->Get_Religion();
        $list_nationalities = $this->Etudiants->Get_Nationalitie();

        return view('Etudiants.craete', compact('list_genders', 'list_classes', 'list_niveauxdetudes',
                                                'list_sections','list_parentes','list_religions','list_nationalities'));







    }


    public function store(Request $request)
    {
        //
    }


    public function show(Etudiants $etudiants)
    {
        //
    }


    public function edit(Etudiants $etudiants)
    {
        //
    }


    public function update(Request $request, Etudiants $etudiants)
    {
        //
    }

    public function destroy(Etudiants $etudiants)
    {
        //
    }

    public function getclasses($id){
    return $this->Etudiants->getclasses($id);
    }
}
