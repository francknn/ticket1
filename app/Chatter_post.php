<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatter_post extends Model
{
    protected $table = 'chatter_post';
    protected $fillable = [
        'body',
        'user_id',
        'markdown',
        'locked',
        'chatter_discussion_id' 


    ];
}
