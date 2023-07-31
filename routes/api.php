<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\MusicHistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('genre/user/{user_id}', [GenreController::class, 'getUserGenres']);
//Route::apiResource('genre', GenreController::class);

Route::get('interest/user/{user_id}', [InterestController::class, 'getUserInterest']);
//Route::apiResource('interest', InterestController::class);

Route::apiResource('music-history', MusicHistoryController::class);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
