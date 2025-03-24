<?php

use Illuminate\Support\Facades\Route;

Route::get('/generate/data',[\App\Http\Controllers\DataController::class,'index'])->name('form');

Route::prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('',[\App\Http\Controllers\DashboardController::class,'index'])->name('index');
});

Route::prefix('/depense')->name('depense.')->group(function () {
    Route::get('/{customerId}',[\App\Http\Controllers\DepenseController::class,'findDepenseByCustomerId'])->name('customer');
    Route::get('/lead/{customerId}',[\App\Http\Controllers\DepenseController::class,'findDepenseLeadDepense'])->name('lead');
    Route::get('/ticket/{customerId}',[\App\Http\Controllers\DepenseController::class,'findDepenseTicketDepense'])->name('ticket');
    Route::get('/update/{depenseId}/{amount}',[\App\Http\Controllers\DepenseController::class,'updateForm'])->name('update.form');
    Route::get('/delete/{depenseId}',[\App\Http\Controllers\DepenseController::class,'delete'])->name('delete');
    Route::post('/update',[\App\Http\Controllers\DepenseController::class,'update'])->name('update');
});

Route::prefix('/seuil')->name('seuil.')->group(function () {
    Route::get('',[\App\Http\Controllers\SeuilController::class,'index'])->name('index');
    Route::post('',[\App\Http\Controllers\SeuilController::class,'save'])->name('save');
});
