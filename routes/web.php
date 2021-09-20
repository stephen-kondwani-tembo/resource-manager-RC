<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ managementController, visitorController};



Route::get('/', function () {
    return inertia('App');
});






#ADMIN ROUTES


Route::get('/PDFManager',[managementController::class, 'pdfManager'])->name('pdf.pdfManager');
Route::get('/edit/{id}',[managementController::class, 'editPDF'])->name('pdf.edit');
Route::get('/pdf',[managementController::class, 'indexPDF'])->name('pdf.index');
Route::post('/pdf',[managementController::class, 'storePDF'])->name('pdf.store');
Route::put('/pdf',[managementController::class, 'updatePDF'])->name('pdf.update');
Route::delete('/pdf/{id}',[managementController::class, 'destroyPDF'])->name('pdf.destroy');


Route::get('/LinkManager',[managementController::class, 'linkManager'])->name('link.linkManager');
Route::get('/links',[managementController::class, 'indexLinks'])->name('link.index');
Route::post('/link',[managementController::class, 'storeLink'])->name('link.store');
Route::delete('/link/{id}',[managementController::class, 'destroyLink'])->name('link.destroy');
Route::put('/link',[managementController::class, 'updateLink'])->name('link.update');
Route::get('/editLink/{id}',[managementController::class, 'editLink'])->name('link.edit');


Route::get('/SnippetManager',[managementController::class, 'snippetManager'])->name('snippet.snippetManager');
Route::get('/snippets',[managementController::class, 'indexSnippets'])->name('snippet.index');
Route::post('/snippet',[managementController::class, 'storeSnippet'])->name('snippet.store');
Route::delete('/snippet/{id}',[managementController::class, 'destroySnippet'])->name('snippet.destroy');
Route::put('/snippet',[managementController::class, 'updateSnippet'])->name('snippet.update');
Route::get('/editSnippet/{id}',[managementController::class, 'editSnippet'])->name('snippet.edit');



# VISITOR ROUTES

Route::get('/resourceSnippets',[visitorController::class, 'getSnippets'])->name('resource.snippets');
Route::get('/resourceLinks',[visitorController::class, 'getLinks'])->name('resource.links');
Route::get('/resourcePDFs',[visitorController::class, 'getPDFs'])->name('resource.pdfs');
Route::get('/download',[visitorController::class, 'download'])->name('resource.download');