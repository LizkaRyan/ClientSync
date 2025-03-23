<?php

use Illuminate\Support\Facades\Route;

Route::get('/generate/data',[\App\Http\Controllers\DataController::class,'index'])->name('form');

Route::prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('',[\App\Http\Controllers\DashboardController::class,'index'])->name('index');
});
