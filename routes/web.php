<?php

use App\Http\Controllers\PdfExportController;
use Illuminate\Support\Facades\Route;

Route::get('/generate/data',[\App\Http\Controllers\DataController::class,'index'])->name('form');

Route::prefix('/login')->name('login.')->group(function(){
    Route::get('',[\App\Http\Controllers\LoginController::class,'loginForm'])->name("form");
    Route::post('',[\App\Http\Controllers\LoginController::class,'login'])->name("launch");
});

Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
    Route::prefix('/depense')->name('depense.')->group(function () {
        Route::get('/ticket',[\App\Http\Controllers\DepenseController::class,'findDepenseTicket'])->name('ticket');    
        Route::get('/lead',[\App\Http\Controllers\DepenseController::class,'findDepenseLead'])->name('lead');    
        Route::get('/{customerId}',[\App\Http\Controllers\DepenseController::class,'findDepenseByCustomerId'])->name('customer');
        Route::get('/lead/{customerId}',[\App\Http\Controllers\DepenseController::class,'findDepenseLeadDepense'])->name('lead.customer');
        Route::get('/ticket/{customerId}',[\App\Http\Controllers\DepenseController::class,'findDepenseTicketDepense'])->name('ticket');
        Route::get('/update/{depenseId}/{amount}',[\App\Http\Controllers\DepenseController::class,'updateForm'])->name('update.form');
        Route::get('/delete/{depenseId}',[\App\Http\Controllers\DepenseController::class,'delete'])->name('delete');
        Route::post('/update',[\App\Http\Controllers\DepenseController::class,'update'])->name('update');
        Route::get('/confirm/update',[\App\Http\Controllers\DepenseController::class,'confirmUpdate'])->name('update.confirm');
        Route::get('/reject/update',[\App\Http\Controllers\DepenseController::class,'rejectUpdate'])->name('reject.confirm');
    });

    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('',[\App\Http\Controllers\DashboardController::class,'index'])->name('index');
    });

    Route::prefix('/seuil')->name('seuil.')->group(function () {
        Route::get('',[\App\Http\Controllers\SeuilController::class,'index'])->name('index');
        Route::post('',[\App\Http\Controllers\SeuilController::class,'save'])->name('save');
    });

    Route::get('/customer',[\App\Http\Controllers\DashboardController::class,'findCustomer'])->name('client');

    Route::get('/customer/upload/form',[\App\Http\Controllers\DashboardController::class,'uploadForm'])->name('uplodadForm');
    Route::post('/customer/upload',[\App\Http\Controllers\DashboardController::class,'upload'])->name('upload');

});

Route::get('/export-pdf',[\App\Http\Controllers\PdfExportController::class,'generatePdf'])->name("export");