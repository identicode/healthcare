<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\DevController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\PurokController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\System\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Citizen\Citizen;
use App\Http\Livewire\Household\Household;
use App\Http\Livewire\Purok\Purok;
use App\Models\Appointment;
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

Route::get('/login', Login::class)->middleware('guest')->name('login');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::resource('purok', PurokController::class);
    Route::resource('household', HouseholdController::class);
    Route::resource('appointment', AppointmentController::class);
    Route::resource('citizen', CitizenController::class);
    Route::resource('users', UserController::class);


    Route::post('/appointment/{appointment}/assess', [AppointmentController::class, 'assess'])->name('appointment.assess');


    Route::get('report', ReportController::class)->name('report');


    Route::view('profile', 'profile.index')->name('profile');



    Route::group(['middleware' => 'role:admin'], function() {
        Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    });






});
