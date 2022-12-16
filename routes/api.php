<?php

use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\API\SurveyController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/settings', [SettingsController::class, 'index']);
Route::post('/settings/create', [SettingsController::class, 'create']);
Route::delete('/settings/delete/{setting}', [SettingsController::class, 'delete']);

Route::post('/survey/create', [SurveyController::class, 'create']);
