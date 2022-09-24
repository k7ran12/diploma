<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Add;
use App\Models\Evento;
use GuzzleHttp\Psr7\Request;
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
    //INformacion General
    $contactos = DB::table('Adds')
        ->select(DB::raw('sum(contacto) as total_contactos'))
        ->first();
    $indicadores = DB::table('Adds')
        ->select(DB::raw('sum(contacto) as total_contactos'))
        ->groupBy('participante')
        ->orderByDesc('total_contactos')
        ->first();
        $buscar = 'all';
        if(!empty($_GET['buscar']))
        {
            $buscar = $_GET['buscar'];
        }

    if ($buscar != 'all') {
        //$puntos = Add::groupBy('participante')->get();
        $puntos = DB::table('Adds')
            ->select(DB::raw('sum(puntos) as total_puntos, sum(contacto) as total_contactos, participante, id'))
            ->groupBy('participante')
            ->where('participante', $buscar)
            ->orderByDesc('total_contactos')
            ->get();
        //Fonia
        $fonia = DB::table('Adds')
            ->select(DB::raw('count(modo) as cantidad, participante'))
            ->groupBy('participante', 'modo')
            ->where(['modo' => 'SSB', 'participante' => $buscar])
            ->orderByDesc('cantidad')
            ->get();
        //FT8
        $ft8 = DB::table('Adds')
            ->select(DB::raw('count(modo) as cantidad, participante'))
            ->groupBy('participante', 'modo')
            ->where(['modo' => 'FT8', 'participante' => $buscar])
            ->orderByDesc('cantidad')
            ->get();
    } else {
        $puntos = DB::table('Adds')
            ->select(DB::raw('sum(puntos) as total_puntos, sum(contacto) as total_contactos, participante, id'))
            ->groupBy('participante')
            ->orderByDesc('total_contactos')
            ->get();
        //Fonia
        $fonia = DB::table('Adds')
            ->select(DB::raw('count(modo) as cantidad, participante'))
            ->groupBy('participante', 'modo')
            ->where('modo', 'SSB')
            ->orderByDesc('cantidad')
            ->get();
        //FT8
        $ft8 = DB::table('Adds')
            ->select(DB::raw('count(modo) as cantidad, participante'))
            ->groupBy('participante', 'modo')
            ->where('modo', 'FT8')
            ->orderByDesc('cantidad')
            ->get();
    }

    return view('principal', compact('evento', 'puntos', 'contactos', 'indicadores', 'fonia', 'ft8'));
})->name('principal.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
Route::get('/indicativo/{usuario}/{top}', [App\Http\Controllers\HomeController::class, 'search'])->name('indicativo.search');
Route::get('/diploma/{usuario}/{tipo_diploma}', [App\Http\Controllers\HomeController::class, 'diploma_pdf'])->name('diploma_pdf.get');
/*Route::resource('/event', EventController::class)->middleware('auth');
Route::resource('event/{event}/participant', ParticipantController::class)->middleware('auth');
Route::resource('event/{event}/participant/{participant}/puntos', PuntoController::class);
Route::resource('/imagen', ImagenController::class)->middleware('auth');*/
Route::resource('/add', AddController::class);
Route::resource('/admin', UsuarioController::class);
