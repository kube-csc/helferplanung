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

Route::get('/', 'App\Http\Controllers\StartseitenController@getStartseitenDaten');
Route::get('/Startseite', 'App\Http\Controllers\StartseitenController@getStartseitenDaten');
Route::get('/Impressum', 'App\Http\Controllers\ImpressumController@getImpressumDaten');
Route::get('/Information/Datenschutzerklärung', 'App\Http\Controllers\DatenschutzerklärungController@getDatenschutzerklärungDaten');
Route::get('/Einsätze/{event_id}', 'App\Http\Controllers\EinsaetzeController@getEinsatätzeDaten');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
