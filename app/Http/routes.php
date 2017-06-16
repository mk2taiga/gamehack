<?php

Route::get('/', 'WelcomeController@index');

// ユーザ登録用のルーティング
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

// ログイン認証用のルーティング
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['show']]);
    //フォロー用のルーティング
    Route::group(['prefix' => 'users/{id}'], function () { 
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        //お気に入りのルーティング
        Route::get('favoritings', 'UsersController@favoritings')->name('users.favoritings');
    });
    
    //お気に入り用のルーティング
    Route::group(['prefix' => 'tweets/{id}'], function () {
        Route::post('favorite', 'UserFavoriteController@store')->name('user.favorite');
        Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('user.unfavorite');
        Route::get('favoriters', 'UsersController@favoriters')->name('users.favoriters');
    });
    
    //検索用のルーティング
    Route::get('tweets/search', 'TweetsController@search')->name('tweets.search');
    Route::resource('tweets', 'TweetsController');
});
