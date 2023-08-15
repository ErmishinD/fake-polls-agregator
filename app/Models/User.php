<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

   protected $fillable = [
       'email', 'password', 'api_key'
   ];
   
   public function polls() {
        return $this->hasMany(Poll::class);
   }
 }