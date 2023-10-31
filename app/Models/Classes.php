<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable=['Nom_Class','Niveauxdetudes_id'];

    public function niveauxdetudes(){
      return  $this->belongsTo('App\Models\niveauxdetudes', 'Niveauxdetudes_id');
    }
}
