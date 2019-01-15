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


Auth::routes();
Route::get('/survey', 'HomeController@index')->name('survey');
Route::post('/survey/submit', 'HomeController@store')->name('submit');
Route::resource('/', 'ResultController', ['only' => ['index', 'show']]);
Route::get('/result/show/{id}', 'ResultController@show');

Route::get('chemo', function() {

});
