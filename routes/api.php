<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\HistoricController;
// use App\Mail\SendMailNewToolCreated;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('tools', [ToolController::class, 'index']);
Route::get('tool/{id}', [ToolController::class, 'show']);
Route::post('tool', [ToolController::class, 'store']);
Route::put('tool/{id}', [ToolController::class, 'update']);
Route::delete('tool/{id}', [ToolController::class, 'destroy']);

// Route::resource('tools', ToolController::class);

Route::get('historics', [HistoricController::class, 'index']);
