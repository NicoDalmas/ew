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


Route::get('/usuarios', 'UserController@index')
    ->name('users.index');
Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');


Route::group(['middleware' => 'auth'], function(){
Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');
Route::post('/usuarios', 'UserController@store');
Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');
Route::put('/usuarios/{user}', 'UserController@update');
Route::get('/saludo/{name}/{nickname?}', 'WelcomeUserController');
Route::delete('/usuarios/{user}', 'UserController@destroy')->name('users.destroy');
});
//crear routegroup con el auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
