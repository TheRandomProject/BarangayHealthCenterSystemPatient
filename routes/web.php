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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Appointment
|--------------------------------------------------------------------------
*/
Route::get('/appointment', 'AppointmentController@index')->name('appointment')->name('appointment.history');
/*
|--------------------------------------------------------------------------
| Register Appointment
|--------------------------------------------------------------------------
*/
Route::get('/register-appointment', 'AppointmentController@create')->name('register.appointment.create');
Route::post('/register-appointment', 'AppointmentController@store')->name('register.appointment.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
