<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'dateDebut', 'dateFin', 'sujet', 'Description','Pieces','Notes','vehicule_id','status','image'
    ];

    //relation between operation and vehicule (1,n)
    //n opertaions can be on the same vehicule
    public function vehicule(){
        return $this->belongsTo(vehicule::class);
    }
    
}
