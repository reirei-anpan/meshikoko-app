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

Route::controller(EnqueteController::class)->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::get('/show/{unique_identifier}', 'show')->name('enquete.show');
    Route::get('/index/{unique_identifier}', 'index')->name('enquetes.index');
    Route::post('/store', 'store')->name('enquete.store');
    Route::post('/update', 'update')->name('enquete.update');
    Route::post('/enquete_update', 'enquete_update')->name('enquetes.enquete_update');
    Route::post('/vote_update/{unique_identifier}', 'vote_update')->name('enquetes.vote_update');
    Route::get('/votes_create/{unique_identifier}', 'votes_create')->name('enquetes.votes_create');
    Route::get('/votes_edit/{id}', 'votes_edit')->name('enquetes.votes_edit');
    Route::get('/edit/{id}', 'edit')->name('enquete.edit');
});

Route::controller(VoteController::class)->group(function () {

});