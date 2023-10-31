<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;
    
    protected $guarded = [ ];



    public function etudaint()
    {
        return $this->belongsTo('App\Models\Etudiants','id_etudiant');
    }
    public function niveauxdetudes()
    {
        return $this->belongsTo('App\Models\niveauxdetudes','id_niveauxdetudes');
    }

    public function Sections()
    {
        return $this->belongsTo('App\Models\Sections','id_sections');
    }

    public function Classes()
    {
        return $this->belongsTo('App\Models\Classes','id_classes');
    }

    public function Frais()
    {
        return $this->belongsTo('App\Models\Frais','id_frais');
    }

}
