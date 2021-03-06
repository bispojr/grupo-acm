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

//PRINCIPAL
Route::get('/', "PrincipalController@index");
Route::get('/sobre', "PrincipalController@sobre");
Route::get('/membros', "PrincipalController@membros");
Route::get('/agenda', "PrincipalController@agenda");
Route::get('/recursos', "PrincipalController@recursos");
Route::get('/fale-conosco', "PrincipalController@faleConosco");


//CERTIFICADOS
Route::get('/certificados', "CertificadosController@index");

Route::get('/certificados/buscar', "CertificadosController@buscar");
Route::post('/certificados/buscar', "CertificadosController@buscarComCPF");

Route::get('/certificados/validar', "CertificadosController@validar");
Route::post('/certificados/validar', "CertificadosController@validarComCodigo");



