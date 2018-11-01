<?php

 /**
 Route::get('/', function () {
   return 'Home';
});


Route::get('/', function () {
    return view('greeting', ['name' => 'James']);
c

**/
 Route::get('/', function () {
 	return view('welcome', ['title' => 'UCEL']);
}); 	



Route::get('/usuarios', 'UserController@index');

Route::get('/usuarios/{id}', 'UserController@show')
    ->where('id', '[0-9]+');

Route::get('/usuarios/nuevo', 'UserController@create');

Route::get('/saludo/{name}/{nickname?}', 'WelcomeUserController');