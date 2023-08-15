<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model {
    protected $fillable = [
       'title', 'status', 'user_id'
    ];

    public const STATUSES = [
        'PUBLISHED' => 'published',
        'DRAFT' => 'draft',
    ];
   
    protected $hidden = ['password'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function poll_options() {
       return $this->hasMany(PollOption::class);
    }
   
 }