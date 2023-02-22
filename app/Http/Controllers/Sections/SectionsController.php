<?php

namespace App\Http\Controllers\Sections;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\niveauxdetudes;
use App\Models\Classes;
use App\Models\Enseignants;
use App\Models\Sections;
use Illuminate\Support\Facades\Validator;



class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $niveauetudes = niveauxdetudes::with(['Sections'])->get();
        $list_niveauetudes =niveauxdetudes::all();

        return view('sections.index',compact('list_niveauetudes','niveauetudes'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nom_section' => 'required|unique:sections,nom_section',
            'Niveauxdetudes_id' => 'required',
            'classes_id' => 'required'

        ],[
            'Nom.required' =>' Nom de section un obligatoier',
            'Niveauxdetudes_id.required' =>' Niveaux de etudes  un obligatoier',
            'classes_id.required' =>'  classe un obligatoier',
            'nom_section.unique' =>' name un champe unqiue ',
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        // dd($request->statut);
        if($request->statut == null){
           $status_id = 0;
        }else{
            $status_id = 1;
        }


        // $feat = [];
        // foreach ($request->enseignant_id as $key => $n){
        //   $feat[$n];
        // }

        $sections= new  Sections();
        $sections->nom_section = $request->nom_section;
        $sections->Niveauxdetudes_id =$request->Niveauxdetudes_id;
        $sections->classes_id = $request->classes_id;
        $sections->statut = $status_id;
        $sections->enseignant_id = json_encode($request->enseignant_id);
        $sections->save();
        $sections->Enseignants()->attach($request->enseignant_id);
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {



        // dd($request->id);
        $validator = Validator::make($request->all(), [
            "nom_section" => 'required|unique:sections,nom_section,'.$request->id,
            'Niveauxdetudes_id' => 'required',
            'classes_id' => 'required'

        ],[
            'Nom.required' =>' Nom de section un obligatoier',
            'Niveauxdetudes_id.required' =>' Niveaux de etudes  un obligatoier',
            'classes_id.required' =>'  classe un obligatoier',
            'nom_section.unique' =>' name un champe unqiue ',
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        // dd($request->statut);
        if($request->statut == null){
           $status_id = 0;
        }else{
            $status_id = 1;
        }


        // $sections= new  Sections();
        $sections =Sections::findOrFail($request->id);
        // dd($sections);
        $sections->nom_section = $request->nom_section;
        $sections->Niveauxdetudes_id =$request->Niveauxdetudes_id;
        $sections->classes_id = $request->classes_id;
        $sections->enseignant_id = json_encode($request->enseignant_id);
        $sections->statut = $status_id;



        // update pivot tABLE
            if (isset($request->enseignant_id)) {
                $sections->Enseignants()->sync($request->enseignant_id);
                } else {
                $sections->Enseignants()->sync(array());
                }
                    $sections->save();
        // dd($sections);
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


        $section=Sections::where('id',$request->id)->first()->delete();
        toastr()->error('Les données ont été supprimées avec succès');
        return redirect()->back();





    }

    // public function getClasse($id){
    //     $List_classe = Classes::where('Niveauxdetudes_id',$id)->pluck("Nom_Classe","id");
    //     // dd($List_classe);
    //     return $List_classe;
    // }

    public function getclasses($id)
    {
        $var = Classes::where("Niveauxdetudes_id", $id)->pluck("Nom_Classe", "id");

        return $var;
    }


    public function primaire_index(Request $request){
        // dd($list_sections);
        // dd($request->Statut);
        if($request->Statut == "1"){
        $list_niveauetudes =niveauxdetudes::where('Nom','Primaire')->first();
        $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)
                                  ->where('statut',1)->get();
    }elseif($request->Statut == "0"){
        $list_niveauetudes =niveauxdetudes::where('Nom','Primaire')->first();
        $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)
                                  ->where('statut',0)->get();
    }elseif($request->Statut == "10"){
        $list_niveauetudes =niveauxdetudes::where('Nom','Primaire')->first();
        $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
    }else{
        $list_niveauetudes =niveauxdetudes::where('Nom','Primaire')->first();
        $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
    }

        $enseignants = Enseignants::where('niveaux_etudes','Primaire')->get();
        return view('sections.primaire',compact('list_niveauetudes','list_classes','list_sections','enseignants'));

    }

    public function lycee_index(Request $request){
        // $list_niveauetudes =niveauxdetudes::where('Nom','Lycee')->first();
        // $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        // $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        if($request->Statut == "1"){
            $list_niveauetudes =niveauxdetudes::where('Nom','Lycee')->first();
            $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
            $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)
                                      ->where('statut',1)->get();
        }elseif($request->Statut == "0"){
            $list_niveauetudes =niveauxdetudes::where('Nom','Lycee')->first();
            $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
            $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)
                                      ->where('statut',0)->get();
        }elseif($request->Statut == "10"){
            $list_niveauetudes =niveauxdetudes::where('Nom','Lycee')->first();
            $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
            $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        }else{
            $list_niveauetudes =niveauxdetudes::where('Nom','Lycee')->first();
            $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
            $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        }

        $enseignants = Enseignants::where('niveaux_etudes','Lycee')->get();
        return view('sections.lycee',compact('list_niveauetudes','list_classes','list_sections','enseignants'));


    }

    public function college_index(Request $request){
        // $list_niveauetudes =niveauxdetudes::where('Nom','College')->first();
        // $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        // $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        if($request->Statut == "1"){
            $list_niveauetudes =niveauxdetudes::where('Nom','College')->first();
            $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
            $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)
                                      ->where('statut',1)->get();
        }elseif($request->Statut == "0"){
            $list_niveauetudes =niveauxdetudes::where('Nom','College')->first();
            $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
            $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)
                                      ->where('statut',0)->get();
        }elseif($request->Statut == "10"){
            $list_niveauetudes =niveauxdetudes::where('Nom','College')->first();
            $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
            $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        }else{
            $list_niveauetudes =niveauxdetudes::where('Nom','College')->first();
            $list_classes =Classes::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
            $list_sections= Sections::where('Niveauxdetudes_id',$list_niveauetudes->id)->get();
        }
        $enseignants = Enseignants::where('niveaux_etudes','College')->get();
        return view('sections.college',compact('list_niveauetudes','list_classes','list_sections','enseignants'));
    }

    public function test_b(){
        return view('sections.test_b');
    }

}
