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

Route::get('home', 'HomeController@index')->name('home');

Route::get('weight', 'WeightController@index')->name('weight');
Route::post('weight/add', 'WeightController@add')->name('weight.add');
