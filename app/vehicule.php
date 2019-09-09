<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicule extends Model
{
    protected $fillable = [
        'marque', 'immatriculation', 'chevaux', 'type', 'modele', 'dateAchat','etat'
    ];

    //relation between operations and vehicule (a relation of n,1)
    //a vehicule can have 1 or n operations
    public function operations(){
        return $this->hasMany(Operation::class);
    }
}
