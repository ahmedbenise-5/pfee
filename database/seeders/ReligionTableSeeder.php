<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       DB::table('religions')->delete();
       $religions = [
            'Muslim',
            'Christian',
            'Other',
    ];

    foreach($religions as $re){
        Religion::create(['nom'=>$re]);
    }

    }
}
