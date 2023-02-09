<?php

namespace App\Http\Controllers\niveauxdetudes;

use Illuminate\Http\Request;
use App\Models\niveauxdetudes;
use App\Models\Classes;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClasseRequest;
use Validator;

class niveauxdetudescontroller extends Controller
{
    public function index(Request $request)
    {
        $niveauxdetudes = niveauxdetudes::orderBy('created_at', 'desc')->get();
        return view('niveauxdetudes.index',compact('niveauxdetudes'));
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
    public function store(Request  $request)
    {

        $validator = Validator::make($request->all(), [
            'Nom' => 'required|unique:niveauxdetudes,Nom'
            
        ],[
            'Nom.required' =>' name un obligatoier',
            'Nom.unique' =>' name un champe unqiue ',
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
            $cls=new niveauxdetudes();
            $cls->Nom =$request->Nom;
            $cls->Description=$request->Description;
            $cls->save();
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('niveauxdetudes.index');
            // $status = 'Successfully Done';
            // return back()->with(['status' => $status]);

     
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
        //

        $validator = Validator::make($request->all(), [
            "Nom" => 'required|unique:niveauxdetudes,Nom,'.$request->id
        ],[
            'Nom.required' =>' name un obligatoier',
            'Nom.unique' =>' name un champe unqiue ',
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
  
            $classe=niveauxdetudes::find($request->id);
            $classe->update([
            $classe->Nom = $request->Nom,
            $classe->Description = $request->Description,
           ]);
           toastr()->success('Data has update  successfully!');
            return redirect()->route('niveauxdetudes.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $myclasse_id=Classes::where('Niveauxdetudes_id',$request->id)->pluck('Niveauxdetudes_id');

        if($myclasse_id->count()===0){

            $niveauxdetudes = niveauxdetudes::findOrFail($request->id)->delete();
            toastr()->error('Le niveaux de Etude ont été supprimées avec succès !');
            return redirect()->back();

        }else{
            toastr()->error('Il y a des classe liées à ce niveau!');
            return redirect()->back();
        }


           

    }

}
