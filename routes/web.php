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

Route::get('/Einsätze/{event_id}/{key}', 'App\Http\Controllers\EinsaetzeController@getEinsaetzeDaten')->name('einsaetze');
Route::get('/Einsätzebuchen/{Operationalplan_id}/{operationalTime}', 'App\Http\Controllers\OperationalBookingController@create');
Route::post('/Einsätzebuchen/speichern', 'App\Http\Controllers\OperationalBookingController@store');

Route::get('/Helferliste', 'App\Http\Controllers\HelperListController@helperList');
Route::get('/Einsatz/löschen/{operationalBookings_id}', 'App\Http\Controllers\HelperListController@softDelete');
Route::post('/Helferliste/Login', 'App\Http\Controllers\HelperListController@loginCheck');
Route::get('/Anmelden', 'App\Http\Controllers\LoginController@emailLogin');
Route::get('/Abmelden', 'App\Http\Controllers\LoginController@logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
