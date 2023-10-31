<?php

namespace App\Repositories;

use App\Models\Enseignants;
use App\Models\Exame;
use App\Models\niveauxdetudes;
use Illuminate\Support\Facades\Validator;

class ExameRepository implements ExameRepositoryInterface
{
    public function index()
    {
        $exames = Exame::all();
        $niveauxdetudes = niveauxdetudes::all();
        $enseignants = Enseignants::all();
        return view('Exame.index', compact('exames', 'niveauxdetudes', 'enseignants'));
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
            'name' => "required",
            'id_enseignants' => "required",
            'id_niveauxdetudes' => "required",
            'id_classes' => "required",
            'id_sections' => "required",
        ], [
            'name' => "name obligatoire",
            'id_enseignants' => " enseignants obligatoire ",
            'id_niveauxdetudes' => " niveaux de etudes obligatoire",
            'id_classes' => " classes obligatoire",
            'id_sections' => "sections obligatoire",

        ]);

        if ($validator->failed()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $exame = new Exame();
        $exame->name = $request->name;
        $exame->id_enseignants = $request->id_enseignants;
        $exame->id_niveauxdetudes = $request->id_niveauxdetudes;
        $exame->id_classes = $request->id_classes;
        $exame->id_sections = $request->id_sections;
        $exame->save();
        toastr()->success('Exame ajouter avec succes');
        return redirect()->back();
    }
    public function update($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'id_enseignants' => "required",
            'id_niveauxdetudes' => "required",
            'id_classes' => "required",
            'id_sections' => "required",
        ], [
            'name' => "name obligatoire",
            'id_enseignants' => " enseignants obligatoire ",
            'id_niveauxdetudes' => " niveaux de etudes obligatoire",
            'id_classes' => " classes obligatoire",
            'id_sections' => "sections obligatoire",

        ]);

        if ($validator->failed()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $exame = Exame::where('id', $request->id)->first();
        $exame->name = $request->name;
        $exame->id_enseignants = $request->id_enseignants;
        $exame->id_niveauxdetudes = $request->id_niveauxdetudes;
        $exame->id_classes = $request->id_classes;
        $exame->id_sections = $request->id_sections;
        $exame->save();
        toastr()->success('Exame Modifier avec succes');
        return redirect()->back();
    }
    public function destroy($request, $id)
    {
        $exame = Exame::where('id', $request->id)->fisrt();
        $exame->delete();
        toastr()->success('Exame supprimer avec succes');
        return redirect()->back();
    }
}
