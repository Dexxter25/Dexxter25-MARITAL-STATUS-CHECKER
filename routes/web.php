<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaritalRecordController;

Route::get('/', function () {
    return view('main.index');
});

// Define a named route for main
Route::get('/main', [MaritalRecordController::class, 'index'])->name('main.index');
Route::post('/main', [MaritalRecordController::class, 'store'])->name('marital.records.store');

Route::get('/main/records', [MaritalRecordController::class, 'records'])->name('main.records');
Route::delete('/main/records/{id}', [MaritalRecordController::class, 'destroy'])->name('main.records.destroy');
Route::get('/main/view/{id}', [MaritalRecordController::class, 'view'])->name('main.view'); 
Route::put('/main/view/update/{id}', [MaritalRecordController::class, 'update'])->name('main.view.update'); 


