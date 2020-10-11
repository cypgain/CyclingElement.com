<?php

use Illuminate\Support\Facades\Auth;
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
    return view('landing');
});

Auth::routes();

Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile/update/information', 'ProfileController@updateInformation')->name('profile.update_information');
Route::post('profile/update/password', 'ProfileController@updatePassword')->name('profile.update_password');
Route::post('profile/stravapost', 'ProfileController@stravaLinkPost')->name('profile.strava.post');
Route::get('profile/stravaget', 'ProfileController@stravaLinkGet')->name('profile.strava.get');

Route::get('home', 'HomeController@index')->name('home');

Route::get('weight', 'WeightController@index')->name('weight');
Route::post('weight/add', 'WeightController@add')->name('weight.add');

Route::get('ftp', 'FtpController@index')->name('ftp');
Route::post('ftp/add', 'FtpController@add')->name('ftp.add');

Route::get('heartrate', 'HeartRateController@index')->name('heartrate');
Route::post('heartrate/add', 'HeartRateController@add')->name('heartrate.add');

Route::get('trainings', 'TrainingsController@index')->name('trainings');
Route::post('trainings/add/normal', 'TrainingsController@addNormal')->name('trainings.add.normal');
Route::post('trainings/add/recurrent', 'TrainingsController@addRecurrent')->name('trainings.add.recurrent');
Route::get('training/{id}/done', 'TrainingsController@trainingDone')->name('training.done')->where('id', '[0-9]+');
Route::get('training/{id}/notdone', 'TrainingsController@trainingNotDone')->name('training.notdone')->where('id', '[0-9]+');
Route::get('training/{id}/delete', 'TrainingsController@deleteTraining')->name('training.delete')->where('id', '[0-9]+');

Route::get('strava/event', 'StravaHookController@get');
Route::post('strava/event', 'StravaHookController@post');
