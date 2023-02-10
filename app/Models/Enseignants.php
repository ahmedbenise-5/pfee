<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignants extends Model
{
    use HasFactory;
    protected $guarded = [];



    //relation

    public function specializations(){
        return $this->belongsTo('App\Models\specializations' ,'specializations_id');
    }



    public function genders(){
        return $this->belongsTo('App\Models\genders' ,'Genders_id');
    }

}
