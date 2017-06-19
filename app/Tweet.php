<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['content', 'user_id', 'title', 'game_name'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //コメントのリレーション
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function favoriters()
    {
        return $this->belongsToMany(User::class, 'user_favorite', 'tweet_id', 'user_id')->withTimestamps();
    }
    
}
