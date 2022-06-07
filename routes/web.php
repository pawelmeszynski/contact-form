<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TrashController;
use Illuminate\Support\Facades\Route;

Route::get('/', PageController::class)->name('front-page');

Route::resource('emails', EmailsController::class)->except('show');

Route::get('emails/trash', TrashController::class)->name('emails.trash');
