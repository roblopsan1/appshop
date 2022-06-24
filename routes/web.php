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
Route::get('/products/{id}', 'ProductController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/products','ProductController@index');//Listado
    Route::get('/products/create','ProductController@create'); // Formulario
    Route::post('/products','ProductController@store'); //Registrar
    
    Route::get('/products/{id}/edit','ProductController@edit'); // Formulario edición
    Route::post('/products/{id}/edit','ProductController@update'); //Actualizar
    
    Route::delete('/products/{id}','ProductController@destroy'); //Eliminar
    
    //Rutas para imagenes
    Route::get('/products/{id}/images','ImageController@index'); // Listado de imagenes
    Route::post('/products/{id}/images','ImageController@store'); //Registrar
    Route::delete('/products/{id}/images','ImageController@destroy'); //Eliminar

    Route::get('/products/{id}/images/select/{image}','ImageController@select'); //destacar
});




