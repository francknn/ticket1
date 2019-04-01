<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        
        'nom',
        'prenom',
        'email',
        'telephone',
        'image',
        'user_id'
   ];
   
   public function messages(){
      return $this->hasMany('App\Message');
   }

   public function clients(){
       return $this->hasMany('App\Client');
   }

   public function user()
   {
       return $this->hasOne('App\User');
   }
}
