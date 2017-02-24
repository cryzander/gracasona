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

Route::get('/candidatos', 'CandidatosController@getAllCandidatos');

Route::get('/inserir/{nome}', 'CandidatosController@inserir');

Route::get('/deletar/{id}', 'CandidatosController@deletar');

Route::get('/escolhervotar/{id}', 'CandidatosController@escolherVotar');

Route::get('/votar/{idusuario}/{estrelas}', 'CandidatosController@votar');

Route::get('/getcandidatosendovotado', 'CandidatosController@candidatoIDSendoVotado');

