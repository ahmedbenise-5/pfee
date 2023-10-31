<?php


namespace App\Repositories;

use App\Models\Classes;
use App\Models\Enseignants;
use App\Models\Matieres;
use App\Models\niveauxdetudes;
use App\Models\Sections;
use Illuminate\Support\Facades\Validator;

class MatieresRepository implements MatieresRepositoryInterface
{

    public function index()
    {
        $matieres = Matieres::all();
        $niveauxdetudes = niveauxdetudes::all();
        $enseignants = Enseignants::all();
        $classes = Classes::all();
        return view('Matieres.index', compact('matieres', 'niveauxdetudes', 'enseignants', 'classes'));
    }
    public function edit($id)
    {
    }
    public function show($id)
    {
    }
    public function store($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id_enseignants' => 'required',
            'id_classes' => 'required',
            'id_niveauxdetudes' => 'required',

        ], [
            'name' => 'name de matieres obligatoire',
            'id_enseignants' => 'enseignants  obligatoire',
            'id_classes' => 'classes obligatoire',
            'id_niveauxdetudes' => 'sections obligatoire',
        ]);

        if ($validator->fails()) {
            return  redirect()->back()->withErrors($validator)->withInput();
        }

        $matieres = new Matieres();
        $matieres->name = $request->name;
        $matieres->enseignants = $request->id_enseignants;
        $matieres->id_classes = $request->id_classes;
        $matieres->id_niveauxdetudes = $request->id_niveauxdetudes;
        $matieres->save();
        toastr()->success('Data has been save successfully!');
        return redirect()->back();
    }

    public function update($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id_enseignants' => 'required',
            'id_classes' => 'required',
            'id_niveauxdetudes' => 'required',

        ], [
            'name' => 'name de matieres obligatoire',
            'id_enseignants' => 'enseignants  obligatoire',
            'id_classes' => 'classes obligatoire',
            'id_niveauxdetudes' => 'niveauxdetudes obligatoire',
        ]);

        if ($validator->fails()) {
            return  redirect()->back()->withErrors($validator)->withInput();
        }

        $matieres = Matieres::findOrFail($request->id);
        $matieres->name = $request->name;
        $matieres->enseignants = $request->id_enseignants;
        $matieres->id_classes = $request->id_classes;
        $matieres->id_niveauxdetudes = $request->id_niveauxdetudes;
        $matieres->save();
        toastr()->success('Data has been update successfully!');
        return redirect()->back();
    }
    public function destory($request, $id)
    {
        Matieres::where('id', $request->id)->delete();
        toastr()->success('Data has been delete successfully!');
        return redirect()->back();
    }
}
