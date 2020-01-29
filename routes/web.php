<?php

Route::get('/', function() { return redirect() -> route('post.index'); });

Route::get('/post', 'PostController@index') -> name('post.index');
Route::get('/post/create', 'PostController@create') -> name('post.create');
Route::post('/post/store', 'PostController@store') -> name('post.store');

Route::get('/post/{idp}/remove/tag/{idt}', 'ExtraController@removeTagFromPost') -> name('post.remove.tag');

Route::get('/post/{id}/edit', 'PostController@edit') -> name('post.edit');
Route::post('/post/{id}/update', 'PostController@update') -> name('post.update');

Route::get('/post/{id}/delete', 'PostController@destroy') -> name('post.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/user/image/set', 'ExtraController@setUserImage') -> name('user.image.set');
