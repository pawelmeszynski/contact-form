<?php

use App\Http\Controllers\PageController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('stronaglowna');
Route::post('/zapisz', [PageController::class, 'store'])->name('zapisz');

Route::get('/list', [PageController::class, 'list'])->name('lista');
