<?php

use App\Http\Controllers\Api\EmailsController;
use App\Http\Controllers\Api\TrashController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::apiresource('emails', EmailsController::class)->except('show');

Route::get('/emails', [EmailsController::class, 'index']);

Route::get('/emails/{id}', [EmailsController::class, 'show']);

Route::put('/emails/{id}/update', [EmailsController::class, 'updateById']);

Route::post('/emails/create', [EmailsController::class, 'create']);

Route::get('/trash', [TrashController::class, 'index']);

Route::get('/emails/{id}/restore', [TrashController::class, 'restore'])->name('trash.restore');

Route::delete('emails/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');

