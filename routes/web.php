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

Route::get('/', [App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get('/profil', [App\Http\Controllers\HomeController::class, "profil"])->name("profil");
Route::get('/struktur', [App\Http\Controllers\HomeController::class, "struktur"])->name("struktur");
Route::get('/dosen', [App\Http\Controllers\HomeController::class, "dosen"])->name("dosen");
Route::get('/matakuliah', [App\Http\Controllers\HomeController::class, "matakuliah"])->name("matakuliah");
Route::get('/posts', [App\Http\Controllers\PostController::class, "index"])->name("posts.index");
Route::get('/posts/{post:slug}', [App\Http\Controllers\PostController::class, "show"])->name("posts.show");

Route::get('/login', [App\Http\Controllers\AuthController::class, "login"])->name("login")->middleware("guest");

Route::post('/login', [App\Http\Controllers\AuthController::class, "authenticate"])->name("authenticate")->middleware("guest");

Route::get('/logout', [App\Http\Controllers\AuthController::class, "logout"])->name("logout")->middleware("auth");

Route::get("/admin/post/createSlug", [App\Http\Controllers\Admin\PostController::class, "createSlug"]);

Route::group(["prefix" => "admin", "as" => "admin.", "middleware" => "auth"], function ()
{
    Route::get('/', function ()
    {
        return redirect("/admin/post");
    })->name("index");

    Route::resource('/dosen', App\Http\Controllers\Admin\DosenController::class)->except("show");
    Route::resource('/matakuliah', App\Http\Controllers\Admin\MatakuliahController::class)->except("show");
    Route::resource('/struktur', App\Http\Controllers\Admin\StrukturController::class)->except("show");
    Route::resource('/post', App\Http\Controllers\Admin\PostController::class);

    Route::post("/post/upload", [App\Http\Controllers\Admin\PostController::class, "upload"])->name("attachment-upload");
    Route::post("/post/remove", [App\Http\Controllers\Admin\PostController::class, "remove"])->name("attachment-remove");
});
