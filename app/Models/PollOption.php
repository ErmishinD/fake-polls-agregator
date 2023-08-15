<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    public $timestamps = false;

   protected $fillable = [
       'text', 'votes_count', 'poll_id'
   ];
   
   public function poll() {
        return $this->belongsTo(Poll::class);
   }
 }