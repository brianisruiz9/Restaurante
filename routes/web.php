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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ingrediente', 'ingredienteController@show');
Route::post('/ingrediente', 'ingredienteController@store');
Route::get('/ingrediente2', 'ingredienteController@show2');
Route::post('/ingrediente2', 'ingredienteController@actualizar');

Route::get('/plato', 'platoController@show');
Route::post('/plato', 'platoController@store');
Route::get('/plato2', 'platoController@show2');
Route::post('/plato2', 'platoController@actualizar');

Route::get('/platoingrediente', 'platoIngredienteController@show');
Route::post('/platoingrediente', 'platoIngredienteController@store');
Route::get('/platoingrediente2', 'platoIngredienteController@show2');
Route::post('/platoingrediente2', 'platoIngredienteController@actualizar');

Route::get('/orden', 'ordenController@show');
Route::post('/orden', 'ordenController@store');
Route::get('/orden2', 'ordenController@show2');
Route::post('/orden2', 'ordenController@actualizar');

Route::get('/ordenplato', 'ordenplatoController@show');
Route::post('/ordenplato', 'ordenplatoController@store');
Route::get('/ordenplato2', 'ordenplatoController@show2');
Route::post('/ordenplato2', 'ordenplatoController@actualizar');

Route::get('/liquidacion', 'liquidacionController@show');
Route::post('/liquidacion', 'liquidacionController@store');

Route::get('/venta', 'ventasController@show');
Route::post('/venta', 'ventasController@store');