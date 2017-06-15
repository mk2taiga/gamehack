<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
    
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
    
    //タイムライン用のメソッド
    public function feed_tweets()
    {
        $follow_user_ids = $this->followings()->lists('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Tweet::whereIn('user_id', $follow_user_ids);
    }
    
    //フォローのためのメソッド
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 自分自身ではないかの確認
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 自分自身ではないかの確認
        $its_me = $this->id == $userId;
        
        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_following($userId) {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    //ここまで
    
    //お気に入りのメソッド、リレーション
    public function favoritings()
    {
        return $this->belongsToMany(Tweet::class, 'user_favorite', 'user_id', 'tweet_id')->withTimestamps();
    }
    
    //お気に入りのメソッド追加
    public function favorite($tweetId)
    {
        $exist = $this->is_favorite($tweetId);
        
        if ($exist) {
            return false;
        }else {
            $this->favoritings()->attach($tweetId);
            return true;
        }
    }
    
    public function unfavorite($tweetId)
    {
        $exist = $this->is_favorite($tweetId);
        
        if ($exist) {
            $this->favoritings()->detach($tweetId);
            return true;
        }else {
            return false;
        }
    }
    
    public function is_favorite($tweetId)
    {
        return $this->favoritings()->where('tweet_id', $tweetId)->exists();
    }
    //ここまで
    
}
