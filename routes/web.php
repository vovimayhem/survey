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
Auth::routes(['register' => false]);

Route::prefix('admin')->group(function () {
	//Dashboard
	Route::resource('/', 'Dashboard\DashboardController', ['only' => ['index']]);

	//Surveys
	Route::resource('surveys', 'Results\ResultController', ['only' => ['index','show']]);

	//Roles
	Route::resource('roles', 'Roles\RoleController', ['except' => ['show']]);

	//Users
	Route::resource('users', 'Users\UserController', ['except' => ['show']]);

	//Export data to cvs
	Route::get('result/export', 'Export\ExportController@exportExcel')->name('export');

	//Custom Logout
	Route::post('logout','Auth\LoginController@logout')->name('user.logout');
});

Route::get('survey/{lang}/case/{case}', 'Survey\SurveyController@show_survey_view')->name('survey');
Route::get('survey/{lang}/case/{case}/show', 'Survey\SurveyController@show_dummy_survey')->name('dummy.survey');
Route::get('welcome/{lang}/case/{case}', 'Survey\SurveyController@show_welcome_view')->name('welcome');
Route::get('thanks/{lang}/case/{case}', 'Survey\SurveyController@show_thanks_view')->name('thanks');
Route::post('survey/submit/{lang}/{case}', 'Survey\SurveyController@store')->name('submit');