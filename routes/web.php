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

Route::auth();

Route::get('cek-pemilih', [App\Http\Controllers\PemilihController::class, 'checkdpt']);
Route::post('cekpemilih', [App\Http\Controllers\PemilihController::class, 'cekpemilih']);

Route::get('calon', [App\Http\Controllers\CalonController::class, 'kenalicalon']);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
});

Route::group(['prefix' => 'pengelola', 'middleware' => 'auth'], function() {

    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
    
Route::group(['prefix' => 'angkatan'], function() { 
    Route::get('/', [App\Http\Controllers\AngkatanController::class, 'index']);
    Route::get('new', [App\Http\Controllers\AngkatanController::class, 'new']);
    Route::post('new', [App\Http\Controllers\AngkatanController::class, 'store']);
    Route::get('edit/{id}', [App\Http\Controllers\AngkatanController::class, 'edit']);
    Route::post('edit', [App\Http\Controllers\AngkatanController::class, 'update']);
    Route::get('delete/{id}', [App\Http\Controllers\AngkatanController::class, 'delete']);
});

Route::group(['prefix' => 'pemilih'], function() { 
    Route::get('/', [App\Http\Controllers\PemilihController::class, 'index']);
    Route::get('new', [App\Http\Controllers\PemilihController::class, 'new']);
    Route::post('new', [App\Http\Controllers\PemilihController::class, 'store']);
    Route::get('import', [App\Http\Controllers\PemilihController::class, 'importpage']);
    Route::post('import', [App\Http\Controllers\PemilihController::class, 'importpemilih']);
    Route::get('edit/{id}', [App\Http\Controllers\PemilihController::class, 'edit']);
    Route::post('edit', [App\Http\Controllers\PemilihController::class, 'update']);
    Route::get('delete/{id}', [App\Http\Controllers\PemilihController::class, 'delete']);
});

Route::group(['prefix' => 'calon-bem'], function() { 
    Route::get('/', [App\Http\Controllers\CalonController::class, 'indexbem']);
    Route::get('new', [App\Http\Controllers\CalonController::class, 'newbem']);
    Route::post('new', [App\Http\Controllers\CalonController::class, 'storebem']); 
    Route::get('edit/{id}', [App\Http\Controllers\CalonController::class, 'editbem']);
    Route::post('edit', [App\Http\Controllers\CalonController::class, 'updatebem']);
    Route::get('delete/{id}', [App\Http\Controllers\CalonController::class, 'deletebem']);
});

});