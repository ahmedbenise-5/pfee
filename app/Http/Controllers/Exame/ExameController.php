<?php

namespace App\Http\Controllers;

namespace App\http\Controllers\Exame;


use App\Models\Exame;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repositories\ExameRepositoryInterface;

class ExameController extends Controller
{



    protected $Exame;

    public function __construct(ExameRepositoryInterface $ExameRepository)
    {
        $this->Exame = $ExameRepository;
    }
    public function index()
    {
        return  $this->Exame->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Exame->store($request);
    }


    public function show(Exame $exame)
    {
        //
    }


    public function edit(Exame $exame)
    {
        //
    }


    public function update(Request $request, Exame $exame)
    {
        return $this->Exame->update($request);
    }


    public function destroy(Request $request, $id)
    {
        return $this->Exame->destroy($request, $id);
    }
}
