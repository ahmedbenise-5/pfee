<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Etudiants;


use App\Models\Etudiants;
use Illuminate\Http\Request;
use App\Repositories\EtudiantsRepositoryInterface;
use App\Repositories\EtudiantsRepository;
use App\Http\Controllers\Controller;

class EtudiantsController extends Controller
{



    protected $Etudiants;

    public function __construct(EtudiantsRepositoryInterface $EtudiantsRepository )
    {
        $this->Etudiants = $EtudiantsRepository;
        // $this->middleware('permission:list_etudaints|ajouter_etudaints|modifier_etudaints|supprimer_etudaints', ['only' => ['index','store']]);
        // $this->middleware('permission:ajouter_etudaints', ['only' => ['create','store']]);
        // $this->middleware('permission:modifier_etudaints', ['only' => ['edit','update']]);
        // $this->middleware('permission:supprimer_etudaints', ['only' => ['destroy']]);
    }

    public function index()
    {

        return $this->Etudiants->index();



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

        return $this->Etudiants->Add_Etudiants($request);
    }


    public function show($id)
    {

      return $this->Etudiants->Show_Etudiants($id);
    }


    public function edit($id)
    {

        $list_genders = $this->Etudiants->Get_genders();
        $list_niveauxdetudes = $this->Etudiants->Get_niveauxdetudes();
        $list_classes = $this->Etudiants->Get_Classes();
        $list_sections = $this->Etudiants->Get_Sections();
        $list_parentes = $this->Etudiants->Get_Parentes();
        $list_religions = $this->Etudiants->Get_Religion();
        $list_nationalities = $this->Etudiants->Get_Nationalitie();

        $Etudiants = Etudiants::findOrFail($id);

        return view('Etudiants.edit', compact('Etudiants','list_genders', 'list_classes', 'list_niveauxdetudes',
                                                'list_sections','list_parentes','list_religions','list_nationalities'));
    }




    public function update(Request $request)
    {

       return $this->Etudiants->Update_Etudiants($request);
    }

    public function destroy(Request $request)
    {
        return $this->Etudiants->Delete_Etudiants($request);

    }

    public function getclasses($id){
    return $this->Etudiants->getclasses($id);
    }

    public function getsections($id){
        return $this->Etudiants->getsections($id);
    }

    public function upload_picesjoint(Request $request){

       return $this->Etudiants->upload_picesjoint($request);

    }


    public function telecharge_picesjoint ($Nom_etudiant,$Nom_pices){
        return $this->Etudiants->telecharge_picesjoint($Nom_etudiant,$Nom_pices);
    }

    public function delete_picesjoint(Request $request){
        return  $this->Etudiants->delete_picesjoint($request);

    }
}
