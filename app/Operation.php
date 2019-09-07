<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'dateDebut', 'dateFin', 'sujet', 'Description','Pieces','Notes','vehicule_id','status','image'
    ];

    public function vehicule(){
        return $this->belongsTo(vehicule::class);
    }
    
}
