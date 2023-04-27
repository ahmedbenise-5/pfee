<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Frais;


use App\Models\Frais;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FraisRepositoryInterface;

class FraisController extends Controller
{



    protected $Frais;

    public function __construct(FraisRepositoryInterface $FraisRepository )
    {
        $this->Frais = $FraisRepository;
    }



    public function index()
    {

       return $this->Frais->index();

    }


    public function create()
    {

    return $this->Frais->create();

    }


    public function store(Request $request)
    {

        return $this->Frais->store($request);
    }


    public function show(Frais $frais)
    {
        //
    }


    public function edit($id)
    {
        return $this->Frais->edit($id);

    }


    public function update(Request $request , $id)
    {
        return $this->Frais->update($request ,$id);
    }


    public function destroy(Request $request)
    {

        return  $this->Frais->destroy($request);

    }
}
