<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncubadoraController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/csrf_token', function () {
    return csrf_token(); 
});

Route::get('/testGet', [IncubadoraController::class, "testGet"]);
Route::post('/testPost', [IncubadoraController::class, "testPost"]);
Route::put('/testPut', [IncubadoraController::class, "testPut"]);
Route::delete('/testDelete', [IncubadoraController::class, "testDelete"]);


Route::get('/status', [IncubadoraController::class, "getIncubatorStatus"]);
Route::post('/tempAndHum', [IncubadoraController::class, "postTemperatureHumidityData"]);