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

Route::get('/', function ()
{
    return view('welcome');
});

Route::get("/admin/post/createSlug", [App\Http\Controllers\Admin\PostController::class, "createSlug"]);

Route::group(["prefix" => "admin", "as" => "admin."], function ()
{
    Route::get('/', function ()
    {
        return redirect("/admin/post");
    })->name("index");

    Route::resource('/dosen', App\Http\Controllers\Admin\DosenController::class)->except("show");
    Route::resource('/matakuliah', App\Http\Controllers\Admin\MatakuliahController::class)->except("show");
    Route::resource('/struktur', App\Http\Controllers\Admin\StrukturController::class)->except("show");
    Route::resource('/post', App\Http\Controllers\Admin\PostController::class);

    // Route::post("/post/upload", [AdminPostController::class, "upload"])->name("attachment-upload");
});
