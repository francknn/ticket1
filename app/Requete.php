<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requete extends Model
{
    protected $fillable = [
        'titre',
        'contenu'
    ];

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
