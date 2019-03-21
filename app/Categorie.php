<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['nom'];
    
    public function requetes(){
        return $this->hasMany('App\Requete');
    }
}
