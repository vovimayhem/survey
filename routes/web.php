<?php

use App\Models\Note;
use App\Models\User;
use App\Models\Result;
use GuzzleHttp\Client;
use App\Mail\SurveyReminder;
use Illuminate\Support\Facades\Mail;
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
	Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard');

	//Surveys
	Route::resource('surveys', 'Results\ResultController', ['only' => ['index','show']]);

	//Note routes only for admin role
	Route::get('notes', 'Notes\NoteController@index')->name('notes.index');
	Route::post('notes', 'Notes\NoteController@store')->name('notes.store');
	Route::delete('notes/{note}', 'Notes\NoteController@destroy')->name('notes.destroy');
	Route::put('notes/{note}', 'Notes\NoteController@update')->name('notes.update');
	Route::get('notes/{note}/edit', 'Notes\NoteController@edit')->name('notes.edit');

	//Note routes for everyone with auth access
	Route::get('notes/mynotes', 'Notes\NoteController@myNotes')->name('notes.mynotes');
	Route::get('notes/{note}/edit/mynote', 'Notes\NoteController@editMyNote')->name('notes.edit.mynote');
	Route::put('notes/{note}/mynote', 'Notes\NoteController@updateMyNote')->name('notes.update.mynote');
	Route::get('notes/survey/{id}', 'Notes\NoteController@showAllNotesFromCase')->name('notes.show.all');

	//Reminders
	Route::resource('reminders', 'Reminders\ReminderController', ['only' => ['index', 'store', 'destroy']]);

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


Route::get('test', function() {
	$message = 'This is a test message. You can add the text that wherever you want. Thank you!';
	$result = Result::find(56);

	//Http client
	$client = new Client(['headers' => ['ns-token' => 'AAAAUf62Amk']]);
    $response = $client->request('GET', 'https://ctaxalert.com/api/?caseid=507456');

    //Get Json 
    $json = $response->getBody()->getContents();
    
    //Get user data
    $name  = json_decode($json)->FullName;
    $email = json_decode($json)->Email;
	
	//Mail::to('anhernandez@communitytax.com')->send(new SurveyReminder($name, $result, $message));
});