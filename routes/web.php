<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Dentist;
use Illuminate\Support\Facades\View;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/','index')->name('home.index');

});


Route::controller(DentistController::class)->group(function () {
    Route::get('/dentists','index')->name('dentists.index')->middleware('auth');
    Route::get('/dentists/create', 'create')->name('dentists.create')->middleware('auth');
    Route::post('/dentists', 'store')->name('dentists.store')->middleware('auth');
    Route::get('/dentists/{id}/edit', 'edit')->name('dentists.edit')->middleware('auth');
    Route::put('/dentists/{id}', 'update')->name('dentists.update')->middleware('auth');

    Route::delete('/dentists/{id}', 'destroy')->name('dentists.destroy')->middleware('auth');


});
Route::controller(PatientController::class)->group(function () {
    Route::get('/patients','index')->name('patients.index')->middleware('auth');
    Route::get('/patients/create', 'create')->name('patients.create')->middleware('auth');
    Route::post('/patients', 'store')->name('patients.store')->middleware('auth');
    Route::get('/patients/{id}/edit', 'edit')->name('patients.edit')->middleware('auth');
    Route::put('/patients/{id}', 'update')->name('patients.update')->middleware('auth');

    Route::delete('/patients/{id}', 'destroy')->name('patients.destroy')->middleware('auth');


});
Route::controller(ServiceController::class)->group(function () {
    Route::get('/services','index')->name('services.index')->middleware('auth');
    Route::get('/services/create', 'create')->name('services.create')->middleware('auth');
    Route::post('/services', 'store')->name('services.store')->middleware('auth');
    Route::get('/services/{id}/edit', 'edit')->name('services.edit')->middleware('auth');
    Route::put('/services/{id}', 'update')->name('services.update')->middleware('auth');

    Route::delete('/services/{id}', 'destroy')->name('services.destroy')->middleware('auth');


});
Route::resource('appointments', AppointmentController::class)->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
});
