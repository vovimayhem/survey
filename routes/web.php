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
Route::get('welcome/{lang}', 'Survey\SurveyController@show_welcome_view')->name('welcome');
Route::get('thanks/{lang}', 'Survey\SurveyController@show_thanks_view')->name('thanks');
Route::get('survey/{lang}', 'Survey\SurveyController@index')->name('survey');
Route::post('survey/submit/{lang}', 'Survey\SurveyController@store')->name('submit');
Route::resource('/', 'Admin\ResultController', ['only' => ['index', 'show']]);
Route::get('result/show/{id}', 'Admin\ResultController@show');
Route::get('result/export', 'Admin\ResultController@exportExcel')->name('export');