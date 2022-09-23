<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PuntoController;
use App\Models\Add;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;
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
    $evento = Evento::first();
    //$puntos = Add::groupBy('participante')->get();
    $puntos = DB::table('Adds')
            ->select(DB::raw('sum(puntos) as total_puntos, sum(contacto) as total_contactos, participante, id'))
             ->groupBy('participante')
             ->orderByDesc('total_contactos')
             ->get();
    return view('principal', compact('evento', 'puntos'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
Route::get('/home/{usuario}', [App\Http\Controllers\HomeController::class, 'search'])->name('home.search');
/*Route::resource('/event', EventController::class)->middleware('auth');
Route::resource('event/{event}/participant', ParticipantController::class)->middleware('auth');
Route::resource('event/{event}/participant/{participant}/puntos', PuntoController::class);
Route::resource('/imagen', ImagenController::class)->middleware('auth');*/
Route::resource('/add', AddController::class);

