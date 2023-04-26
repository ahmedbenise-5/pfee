<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frais extends Model
{
    use HasFactory;


    public function niveauxdetudes()
    {
        return $this->belongsTo('App\Models\niveauxdetudes','id_niveauxdetudes');
    }


    public function Classes()
    {
        return $this->belongsTo('App\Models\Classes','id_classes');
    }
}
