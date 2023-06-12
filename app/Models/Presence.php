<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    public function Etudiants()
        {
            return $this->belongsTo('App\Models\Etudiants','id_etudiant');
        }
    public function Enseignants()
        {
            return $this->belongsTo('App\Models\Enseignants','id_enseignants');
        }
    public function niveauxdetudes()
        {
            return $this->belongsTo('App\Models\niveauxdetudes','id_niveauxdetudes');
        }
    public function Classes()
        {
            return $this->belongsTo('App\Models\Classes','id_classes');
        }
   
    public function Sections()
        {
            return $this->belongsTo('App\Models\Sections','id_sections');
        }
   
    
}
