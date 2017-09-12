<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use aerows\Models;

Route::get('/padron/{cuil}', 'AerolineasController@index');
Route::get('/info',function (){ echo phpinfo(); });