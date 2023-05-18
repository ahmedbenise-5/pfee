<?php



namespace App\Repositories;



interface RecuEtudiantRepositoryInterface {


  public function index();

  public function show($id);
   
  public function edit($id);

  public function store($id);

  public function update($request);

  public function destroy($request);



}