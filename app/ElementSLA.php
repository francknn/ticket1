<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementSLA extends Model
{ protected $table = 'elementsla';
    protected $fillable = [
        'intitule',
        'degre',
        'deadline',
        'projet_id'
    ];
}
