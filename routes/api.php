<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\managementController;
use App\Http\Controllers\visitorController;

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
Route::get('/download',[visitorController::class, 'download'])->name('resource.download');

Route::post('/pdf',[managementController::class, 'storePDF'])->name('pdf.store');
Route::delete('/pdf/{id}',[managementController::class, 'destroyPDF'])->name('pdf.destroy');

Route::post('/snippet',[managementController::class, 'storeSnippet'])->name('snippet.store');
Route::delete('/snippet/{id}',[managementController::class, 'destroySnippet'])->name('snippet.destroy');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
