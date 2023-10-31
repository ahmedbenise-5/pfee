<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Matieres;

use App\Models\Matieres;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MatieresRepositoryInterface;


class MatieresController extends Controller
{


    protected $Matieres;

    public function __construct(MatieresRepositoryInterface $MatieresRepository)
    {
        $this->Matieres = $MatieresRepository;
    }


    public function index()
    {
        return  $this->Matieres->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Matieres->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matieres  $matieres
     * @return \Illuminate\Http\Response
     */
    public function show(Matieres $matieres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matieres  $matieres
     * @return \Illuminate\Http\Response
     */
    public function edit(Matieres $matieres)
    {
        //
    }


    public function update(Request $request, $id)
    {
        return $this->Matieres->update($request, $id);
    }


    public function destroy(Request $request, $id)
    {
        return $this->Matieres->destory($request, $id);
    }
}
