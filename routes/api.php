<?php

use App\Http\Controllers\Api\EmailsController;
use App\Http\Controllers\Api\TrashController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiresource('emails', EmailsController::class)->except('show');

Route::get('/emails', [EmailsController::class, 'show']);

Route::get('/emails/{id}', [EmailsController::class, 'showById']);

Route::put('/emailsupdate/{id}', [EmailsController::class, 'updateById']);

Route::post('/emails/create', [EmailsController::class, 'create']);

Route::get('/emails/trash', [TrashController::class, 'index']);

//Route::get('/emails/trash', [TrashController::class, 'show'])->name('trash.show');

Route::get('emails/restore/one/{id}', [TrashController::class, 'restore'])->name('trash.restore');

Route::delete('users/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');
