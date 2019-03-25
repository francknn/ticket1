<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = ['nom',
    'periode',
    'isSLA',
    'entreprise_id',
    'categorie_id'];
}
