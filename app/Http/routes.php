<?php

Route::get('/', 'WelcomeController@index');

// ユーザ登録用のルーティング
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');