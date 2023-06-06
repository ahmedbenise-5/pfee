<?php


namespace App\Http\Controllers\Parentes;


use Validator;
use App\Models\User;
use App\Models\Parentes;
use App\Models\Religion;
use App\Models\FileParentes;
use App\Models\Nationalitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File as FileFacade;



class ParentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nationalites=Nationalitie::all();
        $religions=Religion::all();
        $parentes= Parentes::all();
        return  view('parentes.index',compact('parentes','nationalites','religions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nationalites=Nationalitie::all();
        $religions=Religion::all();
        return  view('parentes.create',compact('nationalites','religions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Email' => 'required|unique:parentes,Email',
            // 'Password' => 'required| min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'Password' => 'required',
            'NomPraent' => 'required',
            'nomTravail' => 'required',
            'Numerotéléphone' =>'required|min:10|numeric',
            'NumeroIdentifiant' => 'required|min:6',
            'nationalite_id' => 'required',
            'religion_id' => 'required',
            'adresse' => 'required',

        ],[


        ]);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $parentes= new Parentes();
        $parentes->Email=$request->Email;
        $parentes->Password=bcrypt($request->Password);
        $parentes->NomPraent=$request->NomPraent;
        $parentes->nomTravail=$request->nomTravail;
        $parentes->Numerotéléphone=$request->Numerotéléphone;
        $parentes->NumeroIdentifiant=$request->NumeroIdentifiant;
        $parentes->adresse=$request->adresse;
        $parentes->nationalite_id=$request->nationalite_id;
        $parentes->religion_id=$request->religion_id;
        $parentes->save();

        if($request->hasFile('file')){
           $parentes_id=Parentes::latest()->first();
            $file=$request->file('file');
            $file_name=$file->getClientOriginalName();
            $Nom_parentes=$parentes_id->NomPraent;


            $file= new FileParentes();
            $file->NomFolder=$file_name;
            $file->parenteID=$parentes_id->id;
            $file->save();

            //move to file
            $file_name=$request->file->getClientOriginalName();
            $request->file->move(public_path('parent_attachments/'.$Nom_parentes),$file_name);

            //  :Fon?U#i:Ln.:9iV#i


        }

         // craetion users 
         $users = new User();
         $users->email=$request->Email;
         $users->password=bcrypt($request->Password);
         $users->name=$request->NomPraent;
         $users->assignRole(4);
         $users->save();
         $parentes->user_id=$users->id;
         $parentes->save();

        toastr()->success('Data has been saved successfully!');
        return view('parentes.index ');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parentes  $parentes
     * @return \Illuminate\Http\Response
     */
    public function show(Parentes $parentes)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parentes  $parentes
     * @return \Illuminate\Http\Response
     */
    public function edit(Parentes $parentes,$id)
    {
        //
        $nationalites=Nationalitie::all();
        $religions=Religion::all();
        $parentes= Parentes::where('id',$id)->first();
        return  view('parentes.edit',compact('parentes','nationalites','religions'));    }

    /**
     * Update the specified resource in sto    rage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parentes  $parentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validator = Validator::make($request->all(), [
            'Email' => 'required|unique:parentes,Email,'.$request->id,
            'Password' => 'required',
            'NomPraent' => 'required',
            'nomTravail' => 'required',
            'Numerotéléphone' =>'required|min:10|numeric',
            'NumeroIdentifiant' => 'required|min:6',
            'nationalite_id' => 'required',
            'religion_id' => 'required',
            'adresse' => 'required',

        ],[


        ]);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $parentes=Parentes::where('id',$request->id)->first();
        $parentes->Email=$request->Email;
        $parentes->Password=bcrypt($request->Password);
        $parentes->NomPraent=$request->NomPraent;
        $parentes->nomTravail=$request->nomTravail;
        $parentes->Numerotéléphone=$request->Numerotéléphone;
        $parentes->NumeroIdentifiant=$request->NumeroIdentifiant;
        $parentes->adresse=$request->adresse;
        $parentes->nationalite_id=$request->nationalite_id;
        $parentes->religion_id=$request->religion_id;
        $parentes->save();

        $parentes=Parentes::where('id',$parentes->id)->first();
        // dd($parentes);
        // $fil_path=public_path('parent_attachments/'.$parentes->NomPraent);
        // dd($fil_path);
        // dd($request->hasFile('file'));
        if($request->hasFile('file')){
                  Storage::disk('parent_attachments')->deleteDirectory($request->old_name);
                    $file=$request->file('file');
                    $file_name=$file->getClientOriginalName();
                    $Nom_parentes=$parentes->NomPraent;

                    $file= FileParentes::where('parenteID',$parentes->id)->first();
                    $file->NomFolder=$file_name;
                    $file->save();

                    //move to file
                    $file_name=$request->file->getClientOriginalName();
                    $request->file->move(public_path('parent_attachments/'.$Nom_parentes),$file_name);
            }
            $users = User::where('id',$parentes->user_id)->first();
            $users->email=$request->Email;
            $users->password=bcrypt($request->Password);
            $users->name=$request->NomPraent;
            DB::table('model_has_roles')->where('model_id',$parentes->user_id)->delete();
            $users->assignRole(4);
            $users->save();
    
            $parentes->user_id=$users->id;
            $parentes->save();


        toastr()->success('Data has been upadte successfully!');
        return redirect()->route('parentes.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parentes  $parentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        //delete parentes
        $id = $request->id;
        $parentes= Parentes::where('id',$request->id)->first();
        $file_attche = FileParentes::where('parenteID',$id)->first();

        if (!empty($file_attche->parenteID)) {

            Storage::disk('parent_attachments')->deleteDirectory($parentes->NomPraent);
        }

        $parentes->forceDelete();
        toastr()->error('Les données ont été supprimées avec succès');
        return redirect()->back();




        // $id = $request->id;
        // $invoices = Parentes::where('id', $id)->first();
        // $Details = FileParentes::where('parenteID', $id)->first();




        // if (!empty($Details->invoice_number)) {

        //     Storage::disk('public_uploads')->deleteDirectory($Details->invoice_number);
        // }

        // $invoices->forceDelete();

    }
}
