<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_tweets = $user->tweets()->count();
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();
        $count_favoritings = $user->favoritings()->count();
        
        return [
            'count_tweets' => $count_tweets,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
            'count_favoritings' => $count_favoritings,
        ];
    }
    
    public function tweet_counts($tweet) {
        $count_favoriters = $tweet->favoriters()->count();
        
        return [
            'count_favoriters' => $count_favoriters,
        ];
    }
}
