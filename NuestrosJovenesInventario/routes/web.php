<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('index', 'IndexController@index')->name('index');

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
