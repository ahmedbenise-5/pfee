<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\RecuDeEchange;

use Illuminate\Http\Request;
use App\Models\RecuDeEchange;
use App\Http\Controllers\Controller;
use App\Repositories\RecuDeEchangeRepositoryInterface;



class RecuDeEchangeController extends Controller
{

    protected $RecuDeEchange;

    public function __construct(RecuDeEchangeRepositoryInterface $RecuDeEchangeRepository )
    {
        $this->RecuDeEchange = $RecuDeEchangeRepository;
    }
    
    public function index()
    {
        return $this->RecuDeEchange->index();
    }

    public function create($id)
    {
        return $this->RecuDeEchange->create($id);
     
    }


    public function store(Request $request)
    {
     return $this->RecuDeEchange->store($request);
    }

    public function show($id)
    {
        return $this->RecuDeEchange->show($id);
    }

    
    public function edit($id)
    {
      return $this->RecuDeEchange->edit($id);   
    }

    
    public function update(Request $request)
    {
        return $this->RecuDeEchange->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->RecuDeEchange->destroy($request);
    }

    public function RecuEechanges_pdf($id){
        return $this->RecuDeEchange->RecuEechanges_pdf($id);
    }
}
