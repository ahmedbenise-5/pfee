<?php

namespace Database\Seeders;

use App\Models\specializations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specialites = [
            'dev',
            'arabe',
            'eng',
    ];

    foreach($specialites as $specialite){
        specializations::create(['Nom_Sp'=>$specialite]);
    }
    }
}
