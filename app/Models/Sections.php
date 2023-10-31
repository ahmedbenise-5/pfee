<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory ;


    public function Classes(){
        return $this->belongsTo('App\Models\Classes','classes_id');
    }


    public function Enseignants(){
        return $this->belongsToMany('App\Models\Enseignants','_sections__enseignants');
    }
}
