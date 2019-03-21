<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = [
        
        'nom',
        'logo',
        'siege',
        'site',
        'email',
        'telephone',
        'secteuractivite',
    ];
    
}
