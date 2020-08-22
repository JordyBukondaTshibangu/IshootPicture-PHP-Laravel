<?php

Auth::routes();

Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');

Route::get('/profile/{user}', 'ProfileController@index')->name('home');
Route::get('/profile/{user}/edit', 'ProfileController@edit');
Route::patch('/profile/{user}', 'ProfileController@update');

Route::post('/follow/{user}', 'FollowController@store');

