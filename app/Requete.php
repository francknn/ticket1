<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requete extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'categorie_id',
        'client_id', 'sla_id',
        'projet_id',
        'image'
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
