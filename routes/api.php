<?php

use App\Http\Controllers\Api\EmailsController;
use App\Http\Controllers\Api\TrashController;
use Illuminate\Support\Facades\Route;

Route::apiresource('emails', EmailsController::class)->except('show');

Route::get('/emails', [EmailsController::class, 'index']);

Route::get('/emails/{id}', [EmailsController::class, 'show']);

Route::put('/emails/{id}/update', [EmailsController::class, 'updateById']);

Route::post('/emails/create', [EmailsController::class, 'create']);

Route::get('/trash', [TrashController::class, 'index']);

Route::get('/emails/{id}/restore', [TrashController::class, 'restore'])->name('trash.restore');

Route::delete('emails/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');


