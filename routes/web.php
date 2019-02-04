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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@buscarArt');

Route::get('/perfil/{id}','HomeController@showPerfil');
Route::post('/perfil/{id}','HomeController@actualizar');

Route::get('/intercambio/{id}','HomeController@showIntercambio');
Route::post('/intercambio/{id}','HomeController@eliminarIntercambio');

Route::get('/inventario/{id}','HomeController@showInventario');
Route::post('/inventario/{id}','HomeController@eliminarArt');

Route::get('cargar-articulos/{id}','HomeController@mostrarArt');
Route::post('cargar-articulos/{id}','HomeController@agregarArt');


Route::get('gestionar-intercambio/{id}/','HomeController@gestionarIntercambio');
Route::post('gestionar-intercambio/{id}/','HomeController@intercambiar');

Route::get('comentario/{id}/','HomeController@comentario');
Route::post('comentario/{id}/','HomeController@enviarComentario');