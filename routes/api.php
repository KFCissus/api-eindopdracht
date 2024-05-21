<?php

use App\Http\Controllers\API\ArtikelController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BoodscapController;
use App\Http\Controllers\API\KlantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);





Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', function (Request $request) {
        return auth()->user();
    });
    Route::apiResource('Klant',KlantController::class);
    Route::apiResource('Boodschaplijst',BoodscapController::class);
    Route::apiResource('artikel',ArtikelController::class);

    Route::post('/logout', [AuthController::class, 'logout']);

});

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists,contact support'], 404);
});




