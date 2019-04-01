<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $fillable = [
        
        'requete_id',
        'service_id',
        'employe_id',
        'deadline',
        'statut',
    ];
}
