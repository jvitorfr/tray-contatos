<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/contato/index', 'ContatoController@index')->name('Contato');
Route::get('/contato/form', 'ContatoController@create');
Route::get('/contato/telefoneform/{id}', 'ContatoController@createTelefone');
Route::get('/contato/{id}', 'ContatoController@getById')->where('id', '[0-9]+');
Route::get('/contato/form/{id}', 'ContatoController@getById')->where('id', '[0-9]+');
Route::get('/contato/telefone/{id}', 'ContatoController@getTelByContatoId')->where('id', '[0-9]+');
Route::get('/telefone/{id}/{idContato}', 'ContatoController@getTelById')->where('id', '[0-9]+')->where('idContato', '[0-9]+');


Route::post('/contato/insert', 'ContatoController@insert');
Route::put('/contato/update', 'ContatoController@update');
Route::delete('/contato/delete/{id}', 'ContatoController@destroy');

Route::post('/contato/inserttelefone', 'ContatoController@insertTelefone');
Route::put('/contato/updatetelefone', 'ContatoController@updateTelefone');
Route::delete('/contato/deletetelefone/{id}/{idContato}', 'ContatoController@destroyTelefone');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



