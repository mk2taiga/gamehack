<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'tweet_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }
}
