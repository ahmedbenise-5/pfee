<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisTraitement extends Model
{
    use HasFactory;



    public function etudaint(){
        return $this->belongsTo('App\Models\Etudiants','Etudaint_id');
    }
}
