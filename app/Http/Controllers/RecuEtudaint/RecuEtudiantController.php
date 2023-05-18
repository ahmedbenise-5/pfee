<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\RecuEtudaint;


use App\Models\RecuEtudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RecuEtudiantRepositoryInterface;


class RecuEtudiantController extends Controller
{


    protected $RecuEtudiant;

    public function __construct(RecuEtudiantRepositoryInterface   $RecuEtudaintRepository)
    {
        $this->RecuEtudiant = $RecuEtudaintRepository;
    }

   
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $this->RecuEtudiant->store($request);
    }

    
    public function show($id)
    {
        return  $this->RecuEtudiant->show($id);
    }

    
    public function edit(RecuEtudiant $recuEtudiant)
    {
        //
    }

    
    public function update(Request $request, RecuEtudiant $recuEtudiant)
    {
        //
    }

    
    public function destroy(RecuEtudiant $recuEtudiant)
    {
        //
    }
}
