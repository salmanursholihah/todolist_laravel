<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdUploadController;

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



Route::post('/midtrans/callback', [SubscriptionsController::class, 'callback'])->name('midtrans.callback');

///iklan
Route::get('/admin/ads', [AdController::class, 'index']);
Route::post('/ads/event', [AdController::class, 'event']);


//admin crud (agar dapat melindungi dengan sanctum / auth middleware)
Route::get('/admin/ads', [AdController::class, 'list']);
Route::post('/admin/ads', [AdController::class, 'store']);
Route::post('/admin/ads/upload', [AdUploadController::class, 'store']);
Route::put('/admin/ads/{ad}', [AdController::class, 'update']);
Route::delete('/admin/ads/{ad}', [AdController::class, 'destroy']);



