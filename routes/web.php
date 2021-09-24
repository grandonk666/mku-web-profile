<?php

use App\Http\Controllers\AdminDosenController;
use App\Http\Controllers\AdminMatakuliahController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminStrukturController;
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

Route::get('/', function ()
{
    return view('welcome');
});

Route::group(["prefix" => "admin"], function ()
{
    Route::get('/', function ()
    {
        return redirect("/admin/struktur");
    });

    Route::resource('/dosen', AdminDosenController::class);
    Route::resource('/matakuliah', AdminMatakuliahController::class);
    Route::resource('/struktur', AdminStrukturController::class);
    Route::resource('/post', AdminPostController::class);
});
