<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Enseignants;

use App\Models\Enseignants;
use Illuminate\Http\Request;
use App\Repositories\EnseignantsRepositoryInterface;
use App\Http\Controllers\Controller;



class EnseignantsController extends Controller
{
    protected $Enseignants;
    protected $Gender;
    protected $Specialisation;

    public function __construct(EnseignantsRepositoryInterface $EnseignantsRepository )
    {
        $this->Enseignants = $EnseignantsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list_enseignants = $this->Enseignants->getAlleEnseignants();
        $list_genders=$this->Enseignants->getAlleGender();
        $list_specialisation=$this->Enseignants->getAlleSpecialisation();
        // dd($list_specialisation);
        return view('Enseignants.index',compact('list_enseignants' ,'list_genders','list_specialisation'));

        //  dd($test);
        // $Enseignants=$this->Enseignants->getAlleEnseignants();
        // dd($Enseignants);



        // $users = $this->Enseignants->getAlleEnseignants();
        // dd($users);
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

        return $this->Enseignants->StoreEnseignants($request);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseignants  $enseignants
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignants $enseignants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignants  $enseignants
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignants $enseignants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignants  $enseignants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignants $enseignants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseignants  $enseignants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignants $enseignants)
    {
        //
    }
}
