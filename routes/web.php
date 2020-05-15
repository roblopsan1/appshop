<?php


Route::get('/', 'Testcontroller@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');

Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');

Route::post('/order','CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    //get- Consultar informacion
    //post  .- modifica la BD
    Route::get('/products','ProductController@index'); //Listado de productos Muestra un listado (Editar o eliminar)
    Route::get('/products/create','ProductController@create'); //crear Muestra un formulario para crear productos
    Route::post('/products','ProductController@store'); //crear  Guarda datos

    //Editar y actuzalizar
    Route::get('/products/{id}/edit','ProductController@edit'); // Muestra un formulario para la edición de productos
    Route::post('/products/{id}/edit','ProductController@update'); //Actualiza un producto

    //Eliminar
    Route::delete('/products/{id}','ProductController@destroy'); //Actualiza un producto


    //Rutas de imagenes
    Route::get('/products/{id}/images','ImageController@index'); //Lista de imagenes
    Route::post('/products/{id}/images','ImageController@store'); //Guarda las imagenes
    Route::delete('/products/{id}/images','ImageController@destroy'); //Eliminar   
    Route::get('/products/{id}/images/select/{image}','ImageController@select'); //Destacar una imágen
});



 
