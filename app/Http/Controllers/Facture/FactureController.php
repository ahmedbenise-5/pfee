<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Facture;

use App\Models\facture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FactureRepositoryInterface;

class FactureController extends Controller
{



    protected $Facture;

    public function __construct(FactureRepositoryInterface $FactureRepository )
    {
        $this->Facture = $FactureRepository;
    }

    public function index()
    {
    return $this->Facture->index();
          
    }


    public function create(Request $request, $id)
    {

    }


    public function store(Request $request)
    {
       return $this->Facture->store($request);
        
    }


    public function show(Request $request, $id)
    {
        return   $this->Facture->show($id);
    }

    public function facture_pdf($id)
    {
        return   $this->Facture->facture_pdf($id);
    }

    public function edit(Request $request,$id)
    {
        return $this->Facture->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Facture->update($request);

    }


    public function destroy(Request $request)
    {
        return $this->Facture->destroy($request);
    }

    public function getmontante($id){
        return $this->Facture->getmontante($id);
    }

}
