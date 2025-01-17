<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        $roles = Role::get();
        // dd($roles);

        // @dd();
        return view('users.index', compact('users','roles'));
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

        try {
            $validator = Validator::make($request->all(), [
                "email" => 'required|unique:users,email,',
                "password" => 'required',
                "name" => 'required',
                // "statut" => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $role_id = $request->role_id;
            $users = new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->statut = $request->statut == "on" ? 1 : 0;
            $users->assignRole($role_id);
            $users->save();
            toastr()->success('Data has been save successfully!');
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e)
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = User::where('id',$id)->first();
       return view('users.show',compact('user'));
    //    dd($user);
     
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request);
        try {
            $validator = Validator::make($request->all(), [
                "email" => 'required|unique:users,email,' . $request->id,
                "password" => 'required',
                "name" => 'required',
                // "statut" => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $role_id = $request->role_id;
            $users = User::where('id', $request->id)->first();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->statut = $request->statut == "on" ? 1 : 0;
            DB::table('model_has_roles')->where('model_id', $users->id)->delete();
            $users->assignRole($role_id);
            $users->save();
            toastr()->success('Data has been update successfully!');
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e)
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $users = User::find($request->id)->delete();
        toastr()->success('Data has been delete successfully!');
        return redirect()->back();


        
    }
}
