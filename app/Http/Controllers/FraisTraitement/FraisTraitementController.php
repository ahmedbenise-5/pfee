<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\FraisTraitement;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FraisTraitementRepositoryInterface;

class FraisTraitementController extends Controller
{

    protected $FraisTraitement;

    public function __construct(FraisTraitementRepositoryInterface $FraisTraitementRepository )
    {
        $this->FraisTraitement = $FraisTraitementRepository;
    }


   
    public function index()
    {
        return $this->FraisTraitement->index();
    }

    
    public function create($id)
    {
        return $this->FraisTraitement->create($id);
       
    }

   
    public function store(Request $request)
    {
        return $this->FraisTraitement->store($request);
    }

    
    public function show($id)
    {
        return $this->FraisTraitement->show($id);
    }

    public function edit($id)
    {
        return $this->FraisTraitement->edit($id);
    }

    
    public function update(Request $request,$id)
    {
        return $this->FraisTraitement->update($request);
    }

    
    public function destroy(Request $request,$id)
    {
        return $this->FraisTraitement->destroy($request);
    }
}
