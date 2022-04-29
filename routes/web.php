<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('front-page');
Route::post('/store', [PageController::class, 'store'])->name('store');

Route::get('/list', [PageController::class, 'list'])->name('list');
