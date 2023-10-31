<?php

namespace App\Repositories;


interface MatieresRepositoryInterface
{

    public function index();
    public function edit($id);
    public function show($id);
    public function store($request);
    public function update($request, $id);
    public function destory($request, $id);
}
