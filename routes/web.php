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

use App\Http\Controllers\TestController;

Route::get('/', 'TestController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products','ProductController@index');//Listado
Route::get('/admin/products/create','ProductController@create'); // Formulario
Route::post('/admin/products','ProductController@store'); //Registrar

Route::get('/admin/products/{id}/edit','ProductController@edit'); // Formulario edición
Route::post('/admin/products/{id}/edit','ProductController@update'); //Actualizar

Route::delete('/admin/products/{id}','ProductController@destroy'); //Eliminar


