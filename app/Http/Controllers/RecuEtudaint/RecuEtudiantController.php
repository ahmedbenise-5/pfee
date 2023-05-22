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
       return $this->RecuEtudiant->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

       return  $this->RecuEtudiant->store($request);
    }

    
    public function show($id)
    {
        return  $this->RecuEtudiant->show($id);
    }

    
    public function edit($id)
    {

        return $this->RecuEtudiant->edit($id);
       
    }

    
    public function update(Request $request)
    {
        return $this->RecuEtudiant->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->RecuEtudiant->destroy($request);
    }
}
