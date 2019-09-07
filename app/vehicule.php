<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicule extends Model
{
    protected $fillable = [
        'marque', 'immatriculation', 'chevaux', 'type', 'modele', 'dateAchat','etat'
    ];

    public function operations(){
        return $this->hasMany(Operation::class);
    }
}
