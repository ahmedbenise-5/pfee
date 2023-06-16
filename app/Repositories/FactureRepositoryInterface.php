<?php

namespace App\Repositories;





 interface FactureRepositoryInterface{


   public function index();
    public function show($id);
    public function facture_pdf($id);
    public function getmontante($id);
    public function store($request);
    public function edit($id);
    public function update($request);
    public  function destroy($request);



 }
