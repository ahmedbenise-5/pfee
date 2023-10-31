<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveauxdetudes extends Model
{
    use HasFactory;
    protected $fillable = ['Nom', 'Description'];

    public function Sections(){
     return $this->hasMany('App\Models\Sections','Niveauxdetudes_id');
    }
}
