<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

// Resource route for documents (CRUD operations)
Route::resource('documents', DocumentController::class);

// Route for downloading a document
Route::get('documents/{document}/download', [DocumentController::class, 'downloadPDF'])->name('documents.download');

// Route for displaying the list of documents
Route::get('/', [DocumentController::class, 'index'])->name('documents.index');
Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');