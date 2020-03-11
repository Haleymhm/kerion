<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/password/reset', function () {
    Auth::logout();
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/administrador','AdministradorController');
Route::post('/administrador/editar','AdministradorController@editar')->name('administrador.editar');
Route::resource('/usuario','UsuarioController');
