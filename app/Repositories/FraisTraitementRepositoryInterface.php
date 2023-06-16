<?php

namespace App\Repositories;

 



interface FraisTraitementRepositoryInterface {


    public function index();
    public function create($id);
    public function show($id);
    public function edit($id);
    public function update($request);
    public function store($request);
    public function destroy($request);
    public function Ftraitements_pdf($id);


}