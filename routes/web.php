<?php
////
//use App\Http\Controllers\EmailsController;
//use App\Http\Controllers\PageController;
//use App\Http\Controllers\TrashController;
//use Illuminate\Support\Facades\Route;
//
//Route::get('/', PageController::class)->name('front-page');
//
//Route::resource('emails', EmailsController::class)->except('show');
//
//Route::get('/emails/trash', [TrashController::class, 'index'])->name('trash.index');
//
//Route::get('emails/restore/one/{id}', [TrashController::class, 'restore'])->name('trash.restore');
//
//Route::delete('users/{id}', [TrashController::class, 'delete'])->name('trash.delete');
