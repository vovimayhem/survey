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

Route::get('survey/{lang}/case/{case}', 'Survey\SurveyController@show_survey_view')->name('survey');
Route::get('welcome/{lang}/case/{case}', 'Survey\SurveyController@show_welcome_view')->name('welcome');
Route::get('thanks/{lang}/case/{case}', 'Survey\SurveyController@show_thanks_view')->name('thanks');
Route::post('survey/submit/{lang}/{case}', 'Survey\SurveyController@store')->name('submit');

Route::resource('/', 'Admin\ResultController', ['only' => ['index', 'show']]);
Route::get('result/show/{id}', 'Admin\ResultController@show');
Route::get('result/export', 'Admin\ResultController@exportExcel')->name('export');