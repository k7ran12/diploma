<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PuntoController;
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
    return view('principal');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/event', EventController::class)->middleware('auth');
Route::resource('event/{event}/participant', ParticipantController::class)->middleware('auth');
Route::resource('event/{event}/participant/{participant}/puntos', PuntoController::class);
Route::resource('/imagen', ImagenController::class)->middleware('auth');

