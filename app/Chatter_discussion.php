<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatter_discussion extends Model
{
    protected $table = 'chatter_discussion';
    
    protected $fillable = [
        'title',
        'user_id',
        'answered',
        'slug',
        'chatter_category_id'
    ];
}
