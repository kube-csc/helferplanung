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
Route::get('/Information/Datenschutzerklaerung', 'App\Http\Controllers\DatenschutzerklärungController@getDatenschutzerklärungDaten');

Route::get('/Einsatz/eintragen/{event_id}/{key}', 'App\Http\Controllers\EinsaetzeController@getEinsaetzeDaten')->name('einsaetze');
Route::get('/Einsatz/buchen/{Operationalplan_id}/{operationalTime}', 'App\Http\Controllers\OperationalBookingController@create');
Route::post('/Einsatz/buchen/speichern', 'App\Http\Controllers\OperationalBookingController@store');

Route::get('/Einsatz/buchen/direkt/{Operationalplan_id}/{datum}/{ah}/{eh}', 'App\Http\Controllers\OperationalBookingController@createDirekt');
Route::get('/Einsatz/stornieren/{operationalBookings_id}', 'App\Http\Controllers\OperationalBookingController@softDeleteDirekt');

Route::get('/Helferliste', 'App\Http\Controllers\HelperListController@helperList');
Route::get('/Einsatz/loeschen/{operationalBookings_id}', 'App\Http\Controllers\HelperListController@softDelete');
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
