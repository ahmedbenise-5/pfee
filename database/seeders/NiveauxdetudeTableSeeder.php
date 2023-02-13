<?php

namespace Database\Seeders;

use App\Models\niveauxdetudes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveauxdetudeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('niveauxdetudes')->delete();
        $nvds = [
             'Primaire',
             'Lycee',
             'College',
     ];

     foreach($nvds as $nvd){
        niveauxdetudes::create(['Nom'=>$nvd]);
     }
     }
}
