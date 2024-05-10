<?php

use App\Http\Controllers\API\ArtikelController;
use App\Models\artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\KlantController;
use App\Http\Controllers\API\BoodscapController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//header('Access-Control-Allow-Origin: *');
//
//header('Access-Control-Allow-Methods: GET, POST, PATCH, DELETE');
//
//header("Access-Control-Allow-Headers: X-Requested-With");

Route::apiResource('Klant',KlantController::class);
Route::apiResource('Boodschaplijst',BoodscapController::class);
Route::apiResource('Artikel',ArtikelController::class);




