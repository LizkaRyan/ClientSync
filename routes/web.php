<?php

use Illuminate\Support\Facades\Route;

Route::get('/generate/data',[\App\Http\Controllers\DataController::class,'index'])->name('form');

//Route::prefix('/depot')->name('depot.')->group(function () {
//    Route::get('',[\App\Http\Controllers\FondController::class,'formDepot'])->name('form');
//    Route::post('',[\App\Http\Controllers\FondController::class,'insertDepot'])->name('insert');
//});
