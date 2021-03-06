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
Route::get('/register/counseling', 'AppointmentController@counseling')->name('register.appointment.create');
Route::get('/register/dental', 'AppointmentController@dental')->name('register.appointment.create');
Route::get('/register/outreach-programs', 'AppointmentController@outreachprogram')->name('register.appointment.create');
Route::get('/register/prenatal', 'AppointmentController@prenatal')->name('register.appointment.create');
Route::post('/register-appointment', 'AppointmentController@store')->name('register.appointment.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/patient-support', 'PatientSupportController@index');
