<?php

use App\Http\Controllers\CitizenController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Citizen\Citizen;
use App\Http\Livewire\Household\Household;
use App\Http\Livewire\Purok\Purok;
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
    Route::get('/purok', Purok::class)->name('purok');
    Route::get('/household', Household::class)->name('household');

    Route::resource('citizen', CitizenController::class);
});
