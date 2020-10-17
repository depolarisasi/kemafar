<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'pengelola', 'middleware' => 'auth'], function() {
    Route::auth();
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
    
Route::group(['prefix' => 'angkatan'], function() { 
    Route::get('/', [App\Http\Controllers\AngkatanController::class, 'index']);
    Route::get('new', [App\Http\Controllers\AngkatanController::class, 'new']);
    Route::post('new', [App\Http\Controllers\AngkatanController::class, 'store']);
    Route::get('edit/{id}', [App\Http\Controllers\AngkatanController::class, 'edit']);
    Route::post('edit', [App\Http\Controllers\AngkatanController::class, 'update']);
    Route::get('delete/{id}', [App\Http\Controllers\AngkatanController::class, 'delete']);
});
});