<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnqueteController;
use App\Http\Controllers\VoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('enquetes')->group(function () {
    Route::controller(EnqueteController::class)->group(function () {
        Route::get('create', 'create')->name('enquetes.create');
        Route::get('show/{unique_identifier}', 'show')->name('enquetes.show');
        Route::get('index/{unique_identifier}', 'index')->name('enquetes.index');
        Route::post('store', 'store')->name('enquetes.store');
        Route::get('edit/{id}', 'edit')->name('enquetes.edit');
        Route::post('update', 'update')->name('enquetes.update');
    });
});

Route::prefix('votes')->group(function () {
    Route::controller(VoteController::class)->group(function () {
        Route::get('create/{unique_identifier}', 'create')->name('votes.create');
        Route::post('store', 'store')->name('votes.store');
        Route::get('edit/{id}', 'edit')->name('votes.edit');
        Route::post('{unique_identifier}', 'update')->name('votes.update');
    });
});
