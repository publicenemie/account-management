<?php

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/accounts')->name('accounts.')->group(function () {
    Route::post('/create', [AccountController::class, 'create'])->name('create');
    Route::put('/update/one/{id}', [AccountController::class, 'updateOne'])->name('update-one');
    Route::get('/get', [AccountController::class, 'get'])->name('list');
    Route::get('/get/one/{id}', [AccountController::class, 'getOne'])->name('get-one');
    Route::delete('/delete/one/{id}', [AccountController::class, 'deleteOne'])->name('delete-one');
});

Route::prefix('/applications')->name('applications.')->group(function () {
    Route::post('/create', [])->name('create');
    Route::put('/update/one/{id}', [])->name('update-one');
    Route::get('/get', [])->name('list');
    Route::get('/get/one/{id}', [])->name('get-one');
    Route::delete('/delete/one/{id}', [])->name('delete-one');
});

Route::prefix('/user')->name('user.')->group(function () {
    Route::post('/create', [])->name('create');
    Route::put('/update/one/{id}', [])->name('update-one');
    Route::get('/get', [])->name('list');
    Route::get('/get/one/{id}', [])->name('get-one');
    Route::delete('/delete/one/{id}', [])->name('delete-one');
});

Route::prefix('/customer')->name('customer.')->group(function () {
    Route::post('/create', [])->name('create');
    Route::put('/update/one/{id}', [])->name('update-one');
    Route::get('/get', [])->name('list');
    Route::get('/get/one/{id}', [])->name('get-one');
    Route::delete('/delete/one/{id}', [])->name('delete-one');
});
