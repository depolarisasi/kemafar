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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::auth();

Route::get('panduan', [App\Http\Controllers\HomeController::class, 'panduan']);
Route::get('privacy-and-algorithm', [App\Http\Controllers\HomeController::class, 'privacy']);

Route::get('cek-pemilih', [App\Http\Controllers\PemilihController::class, 'checkdpt']);
Route::post('cekpemilih', [App\Http\Controllers\PemilihController::class, 'cekpemilih']);

Route::get('timeline', [App\Http\Controllers\HomeController::class, 'timeline']);
Route::get('hasil', [App\Http\Controllers\SuaraController::class, 'hasilpemilihan']);

Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout']);

Route::get('lapor', [App\Http\Controllers\laporanController::class, 'laporindex']);
Route::post('lapor', [App\Http\Controllers\laporanController::class, 'laporindexstore']);


Route::get('calon', [App\Http\Controllers\CalonController::class, 'kenalicalon']); 

Route::get('calon/bem/', [App\Http\Controllers\CalonController::class, 'semuacalonbem']);
Route::get('calon/bpm/', [App\Http\Controllers\CalonController::class, 'semuacalonbpm']);

Route::get('calon/bem/{id}', [App\Http\Controllers\CalonController::class, 'profilpasanganbem']);
Route::get('calon/bpm/{id}', [App\Http\Controllers\CalonController::class, 'profilcalonbpm']);

Route::get('pilih', [App\Http\Controllers\SuaraController::class, 'pilihauthenticate']);
Route::post('pilih', [App\Http\Controllers\SuaraController::class, 'authenticateuser']);
Route::get('pilih/calon', [App\Http\Controllers\SuaraController::class, 'pilihauthenticated']);
Route::post('pilih/calon', [App\Http\Controllers\SuaraController::class, 'storepilihan']);
Route::get('thankyou', [App\Http\Controllers\SuaraController::class, 'thankyou']);

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

   
Route::group(['prefix' => 'laporan'], function() { 
    Route::get('/', [App\Http\Controllers\laporanController::class, 'index']);
    Route::get('detail/{id}', [App\Http\Controllers\laporanController::class, 'detail']);  
    Route::get('proses/{id}', [App\Http\Controllers\laporanController::class, 'proses']);  
    Route::get('delete/{id}', [App\Http\Controllers\laporanController::class, 'delete']);
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


Route::group(['prefix' => 'calon-bpm'], function() { 
    Route::get('/', [App\Http\Controllers\CalonController::class, 'indexbpm']);
    Route::get('new', [App\Http\Controllers\CalonController::class, 'newbpm']);
    Route::post('new', [App\Http\Controllers\CalonController::class, 'storebpm']); 
    Route::get('edit/{id}', [App\Http\Controllers\CalonController::class, 'editbpm']);
    Route::post('edit', [App\Http\Controllers\CalonController::class, 'updatebpm']);
    Route::get('delete/{id}', [App\Http\Controllers\CalonController::class, 'deletebpm']);
});

Route::group(['prefix' => 'setting'], function() { 
    Route::get('/', [App\Http\Controllers\SettingController::class, 'setting']);
    Route::post('update', [App\Http\Controllers\SettingController::class, 'updatesetting']); 
});


Route::group(['prefix' => 'suara'], function() { 
    Route::get('/', [App\Http\Controllers\SuaraController::class, 'index']);
    Route::post('update', [App\Http\Controllers\SuaraController::class, 'updatesetting']); 
});

});
