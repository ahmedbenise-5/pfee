<?php

namespace Database\Seeders;

use App\Models\genders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('genders')->delete();
        $specialites = [
            'man ',
            'woman',

    ];

    foreach($specialites as $specialite){
        genders::create(['Nom_g'=>$specialite]);
    }
    }


}

