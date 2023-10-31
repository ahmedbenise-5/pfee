<?php

namespace App\Repositories;

use App\Models\Images;
use App\Models\Classes;
use App\Models\genders;
use App\Models\Parentes;
use App\Models\Religion;
use App\Models\Sections;
use App\Models\Etudiants;
use App\Models\Nationalitie;
use App\Models\niveauxdetudes;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\HttpFoundation\Request;

class  EtudiantsRepository implements EtudiantsRepositoryInterface
{



    public function Get_genders(){

       return genders::all();

    }

    public function Get_niveauxdetudes(){

       return niveauxdetudes::all();

    }

    public function Get_Classes(){

       return Classes::all();

    }
    public function Get_Sections(){

       return Sections::all();

    }

    public function Get_Parentes(){

       return Parentes::all();

    }

    public function Get_Religion(){

       return Religion::all();

    }
    public function Get_Nationalitie(){

       return Nationalitie::all();

    }

    public function getclasses($id){

        $list_classes= Classes::where('Niveauxdetudes_id',$id)->pluck('Nom_Classe','id');
        return $list_classes;
    }

    public function getsections($id){

      $list_sections = Sections::where('classes_id',$id)->pluck('nom_section','id');
      return $list_sections;
    }

    public function index(){

        // dd($user = auth()->user()->roles[0]->id);

        $user = auth()->user()->roles[0]->id ?? '';
        

        if($user == 4) {
            // $Etudiants = Parentes::join('etudiants', 'etudiants.id_parentes', 'parentes.id')
            //                     ->join('users', 'users.id', 'parentes.user_id')
            //                     ->join('sections', 'sections.id', 'etudiants.id_sections')
            //                     ->join('classes', 'classes.id', 'etudiants.id_classes')
            //                     ->select('etudiants.*', 'sections.nom_section', 'classes.Nom_Classe')
            //                     ->where('users.id', auth()->user()->id)
            //                     ->get();

            $Etudiants = Etudiants::whereHas('parentes', function ($query) {
                $query->where('user_id','=',auth()->user()->id);
            })->with(['parentes', 'Classes', 'Sections'])->get();
        } elseif($user == 2) {
            $Etudiants = Etudiants::where("user_id",auth()->user()->id)->get();
            // dd($Etudiants);
        }else{
            $Etudiants = Etudiants::all();

        }

        return view('Etudiants.index',compact('Etudiants'));

    }

    public function Add_Etudiants($request){


        // DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:enseignants,email',
                'password' => 'required| min:6|',
                'name' => 'required',
                'date_naissance' => 'required',
                'annee_academique' => 'required',
                'adresss' => 'required',
                'id_gender' => 'required',
                'id_nationalities' => 'required',
                'id_classes' => 'required',
                'id_sections' => 'required',
                'religion_id' => 'required',
                'id_parentes' => 'required',

            ], []);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }


            $Etudiants =  new  Etudiants();
            $Etudiants->email=$request->email;
            $Etudiants->password=$request->password;
            $Etudiants->name=$request->name;
            $Etudiants->date_naissance=$request->date_naissance;
            $Etudiants->annee_academique=$request->annee_academique;
            $Etudiants->adresss=$request->adresss;
            $Etudiants->id_gender=$request->id_gender;
            $Etudiants->id_nationalities=$request->id_nationalities;
            $Etudiants->id_classes=$request->id_classes;
            $Etudiants->id_sections=$request->id_sections;
            $Etudiants->religion_id=$request->religion_id;
            $Etudiants->id_niveauxdetudes=$request->id_niveauxdetudes;
            $Etudiants->id_parentes=$request->id_parentes;
            $Etudiants->save();
            



               if($request->hasfile('files'))
               {

                   foreach($request->file('files') as $file)
                   {

                       // insert image ina local

                       $name_files= $file->getclientoriginalname();
                       $file->storeAs('Piece_De_jointe/Etudiants/'.$Etudiants->name,$name_files,'upload_PieceDejointe');

                       // insert images for iamges_table

                       $images = new Images();
                       $images->Nom_image = $name_files;
                       $images->imageable_id = $Etudiants->id;
                       $images->imageable_type = 'App\models\Etudiants';
                       $images->save();
                   }


               }

               // craetion users 
               $users = new User();
               $users->email=$request->email;
               $users->password=bcrypt($request->password);
               $users->name=$request->name;
               $users->statut= 1;
            //    $users->assignRole(2);
               $users->save();
               $Etudiants->user_id=$users->id;
               $Etudiants->save();


               toastr()->success('Data has been saved successfully!');
               return redirect()->route('etudiants.index');

            // DB::commit();
            // all good
        } catch (\Exception $e) {
            // DB::rollback();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
        //







    }

    public function Update_Etudiants($request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:enseignants,email,' .$request->id,
            'password' => 'required| min:6|',
            'name' => 'required',
            'date_naissance' => 'required',
            'annee_academique' => 'required',
            'adresss' => 'required',
            'id_gender' => 'required',
            'id_nationalities' => 'required',
            'id_classes' => 'required',
            'id_sections' => 'required',
            'religion_id' => 'required',
            'id_parentes' => 'required',

        ], []);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $Etudiants =Etudiants::where('id',$request->id)->first();
        $Etudiants->email=$request->email;
        $Etudiants->password=$request->password;
        $Etudiants->name=$request->name;
        $Etudiants->date_naissance=$request->date_naissance;
        $Etudiants->annee_academique=$request->annee_academique;
        $Etudiants->adresss=$request->adresss;
        $Etudiants->id_gender=$request->id_gender;
        $Etudiants->id_nationalities=$request->id_nationalities;
        $Etudiants->id_classes=$request->id_classes;
        $Etudiants->id_sections=$request->id_sections;
        $Etudiants->religion_id=$request->religion_id;
        $Etudiants->id_niveauxdetudes=$request->id_niveauxdetudes;
        $Etudiants->id_parentes=$request->id_parentes;
        $Etudiants->save();


        $users = User::where('id',$Etudiants->user_id)->first();
        $users->email=$request->email;
        $users->password=bcrypt($request->password);
        $users->name=$request->name;
        // DB::table('model_has_roles')->where('model_id',$Etudiants->user_id)->delete();
        $users->statut= 1;
        // $users->assignRole(2);
        $users->save();

        $Etudiants->user_id=$users->id;
        $Etudiants->save();


        toastr()->success('Data has been update successfully!');
        return redirect()->route('etudiants.index');

    }
    public function Delete_Etudiants($request){

        Etudiants::findOrFail($request->id)->delete();
        toastr()->error('Etudiants ont été supprimées avec succès !');
        return redirect()->back();
    }

    public function Show_Etudiants($id){

        $Etudiants = Etudiants::findorfail($id);
        $images   =Images::all();

        return view('Etudiants.show',compact('Etudiants','images'));


    }


    public function upload_picesjoint($request)
    {

        if($request->hasfile('files'))
        {

            foreach($request->file('files') as $file)
            {

                // insert image ina local

                $name_files= $file->getclientoriginalname();
                $file->storeAs('Piece_De_jointe/Etudiants/'.$request->Etudiants_nom,$name_files,'upload_PieceDejointe');

                // insert images for iamges_table

                $images = new Images();
                $images->Nom_image = $name_files;
                $images->imageable_id = $request->Etudiants_id;
                $images->imageable_type = 'App\models\Etudiants';
                $images->save();
            }


        }

        toastr()->success('Les données ont été sauvegardées avec succès');
        return redirect()->back();
    }



    public function telecharge_picesjoint($Nom_etudiant,$Nom_pices){

        return response()->download(public_path('Piece_De_jointe/Etudiants/'.$Nom_etudiant.'/'.$Nom_pices));

    }

    public function delete_picesjoint($request){

           // dd($request->Etudiants_id);
    // delete for disk
    Storage::disk('upload_PieceDejointe')->delete('Piece_De_jointe/Etudiants/'.$request->Nom_etudiant.'/'.$request->Nom_pices);

    Images::where('id',$request->id)->where('Nom_image',$request->Nom_pices)->delete();

     toastr()->success('Images supprimer avec succes');

    return redirect()->back();
    }


    // return redirect()->route('etudiants.show' ,$request->Etudiants_id);














































     // public function create_etudiant(){
    //     $genders = genders::all();
    //     $niveauxdetudes=niveauxdetudes::all();
    //     $Classes=Classes::all();
    //     $Sections=Sections::all();
    //     $Parentes=Parentes::all();
    //     $Religion=Religion::all();
    //     $Nationalitie=Nationalitie::all();
    //     return view('Etudiants.craete',compact('genders','niveauxdetudes','Classes' ,'Sections','Parentes','Religion','Nationalitie'));
    // }

}
