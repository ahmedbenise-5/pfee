<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;


    public function Sections()
    {
        $this->belongsTo('App\Models\Sections', 'id_sections');
    }
    public function Enseignants()
    {
        $this->belongsTo('App\Models\Sections', 'id_enseignants');
    }
    public function Classes()
    {
        $this->belongsTo('App\Models\Sections', 'id_classes');
    }
    public function niveauxdetudes()
    {
        $this->belongsTo('App\Models\niveauxdetudes', 'id_niveauxdetudes');
    }
}
