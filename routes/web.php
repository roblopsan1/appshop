<?php


Route::get('/', 'Testcontroller@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//get- Consultar informacion
//post  .- modifica la BD
Route::get('/admin/products','ProductController@index'); //Listado de productos Muestra un listado (Editar o eliminar)
Route::get('/admin/products/create','ProductController@create'); //crear Muestra un formulario para crear productos
Route::post('/admin/products','ProductController@store'); //crear  Guarda datos

//Editar y actuzalizar
Route::get('/admin/products/{id}/edit','ProductController@edit'); // Muestra un formulario para la edición de productos
Route::post('/admin/products/{id}/edit','ProductController@update'); //Actualiza un producto

//Eliminar
Route::delete('/admin/products/{id}','ProductController@destroy'); //Actualiza un producto

 
