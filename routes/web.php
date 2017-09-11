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
   // return view('welcome');

return '<h1>Primeira lógica com Laravel</h1';
});

Route::get('/regioes', 'RegiaoController@lista');
Route::get('/cidades', 'RegiaoController@cidades');
Route::get('/cidades/mostra', 'RegiaoController@mostra');
Route::get('/cidades/mostra_cidades.htm', 'RegiaoController@mostra_cidades');
Route::get('/cidades/mostra_regioes', 'RegiaoController@mostra_regioes');
