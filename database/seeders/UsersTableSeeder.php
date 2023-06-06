<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       DB::table('users')->delete();

    $roles = Role::pluck('id')->toArray();
    if( sizeof($roles) == 0 ){
        $arr =['ADMIN','ETUDIANT', 'FORMATEUR', 'PARENT'];
    
        for($i=0 ; $i<count($arr); $i++){
            DB::table('roles')->insert([
                'name' => $arr[$i],
                'guard_name' => 'web',
            ]);
        }
    }


    $user= new User();
    $user->name= "system";
    $user->email= "system@gmail.com";
    $user->password= bcrypt('123456789');
    $user->assignRole(1);
    $user->statut= 1;
    $user->save();

    // DB::table('roles')->delete();
 
   
       

    }
}
