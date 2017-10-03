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

/*Route::get('/', function () {
   // return view('welcome');

return '<h1>Primeira lógica com Laravel</h1';
});*/
Route::get('/', 'RegiaoController@mostra_regioes3');
Route::get('/regioes', 'RegiaoController@lista');
Route::get('/cidades', 'RegiaoController@cidades');
Route::get('mostra_cidades', 'RegiaoController@mostra_cidades2');
Route::get('/mostra_regioes', 'RegiaoController@regioes_controler');
