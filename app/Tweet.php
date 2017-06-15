<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['content', 'user_id', 'title', 'game_name'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
