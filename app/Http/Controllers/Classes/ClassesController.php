<?php

namespace App\Http\Controllers\Classes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Classes;
use App\Models\niveauxdetudes;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Stmt\TryCatch;


class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // dd($request->niveauxetude);
        if($request->niveauxetude){
            $classes = Classes::select('*')->where('Niveauxdetudes_id','=',$request->niveauxetude)->get();
            $nvs = niveauxdetudes::all();
        }else{
            $classes = Classes::all();
            $nvs = niveauxdetudes::all();
        }
        return view('classe.index', compact('classes','nvs'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //

        // $this->validate(request(), [
        //     'Nom_Classe' => 'required',
        //     'Niveauxdetudes_id' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
            'List_classes.*.Nom_Classe' => 'required',
            'List_classes.*.Niveauxdetudes_id' => 'required',

        ],[
            'List_classes.*.Nom_Classe.required' =>' name classe un obligatoier',
            'List_classes.*.Niveauxdetudes_id.required' =>' Niveauxdetudes  un obligatoier',
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
            $List_classes = $request->List_classes;
            foreach ($List_classes as $List_classe) {
                $classe = new Classes();
                $classe->Nom_Classe = $List_classe['Nom_Classe'];
                $classe->Niveauxdetudes_id = $List_classe['Niveauxdetudes_id'];
                $classe->save();
            }
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
    public function edit(Request $request)
    {

        dd($request);
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
        //
        $validator = Validator::make($request->all(), [
            "Nom_Classe" => 'required|unique:classes,Nom_Classe,'.$request->id,
            "Niveauxdetudes_id" => 'required'
        ],[
            'Nom_Classe.required' =>' name classe un obligatoier',
            'Nom_Classe.unique' =>' name un champe unqiue ',
            'Niveauxdetudes_id.required' =>' Niveaux de etudes un obligatoier',
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $classe=Classes::findOrFail($request->id);
        $classe->Nom_Classe=$request->Nom_Classe;
        $classe->Niveauxdetudes_id=$request->Niveauxdetudes_id;
        $classe->save();
        toastr()->success('Data has been update successfully!');
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
         $classe = Classes::findOrFail($request->id)->delete();
         toastr()->error('Les données ont été supprimées avec succès');
         return redirect()->back();

        }


        public function  deleteall(Request $request){
           $delete_all_id= explode(",",$request->delete_all_id);
        //    dd($delete_all_id);
           $classe= Classes::whereIn('id',$delete_all_id)->Delete();
           toastr()->error('Les données ont été supprimées avec succès');
           return redirect()->back();


        }

        public function filtter_nv(Request $request){
            // dd($request);


        }




}

