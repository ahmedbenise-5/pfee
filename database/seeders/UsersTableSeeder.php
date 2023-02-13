<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
       DB::table('users')->insert([
        'name' => 'system',
        'email' => 'system@gmail.com',
        'password' => bcrypt('123456789'),
    ]);

    }
}
