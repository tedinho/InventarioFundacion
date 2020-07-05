<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('index', 'IndexController@index')->name('index');

Route::get('admin/usuario-lista', 'UsuarioController@inicio')->name('usuario-lista');

Route::get('admin/usuario-form', 'UsuarioController@getUsuario')->name('usuario-form');

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('guardarUsuario', 'UsuarioController@guardarUsuario')->name('guardarUsuario');

Route::post('inactivarUsuario/{id}', 'UsuarioController@inactivar')->name('inactivarUsuario');
Route::post('activarUsuario/{id}', 'UsuarioController@activar')->name('activarUsuario');

Route::get('editarUsuario/{id}', 'UsuarioController@editar')->name('editarUsuario');
