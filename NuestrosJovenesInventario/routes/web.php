<?php

use Illuminate\Support\Facades\Route;

//para autentificacion
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('index', 'IndexController@index')->name('index');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//logica usuarios
Route::get('admin/usuario-lista', 'UsuarioController@inicio')->name('usuario-lista');
Route::get('admin/usuario-form', 'UsuarioController@getUsuario')->name('usuario-form');
Route::post('admin/usuario-lista', 'UsuarioController@buscar')->name('buscar-usuario');
Route::post('guardarUsuario', 'UsuarioController@guardarUsuario')->name('guardarUsuario');
Route::post('inactivarUsuario/{id}', 'UsuarioController@inactivar')->name('inactivarUsuario');
Route::post('activarUsuario/{id}', 'UsuarioController@activar')->name('activarUsuario');
Route::get('editarUsuario/{id}', 'UsuarioController@editar')->name('editarUsuario');
