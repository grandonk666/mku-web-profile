<?php

use Illuminate\Support\Facades\Artisan;
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

// Route::get('/migrate', function () {
//     echo Artisan::call('migrate:fresh --seed');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get('/profil', [App\Http\Controllers\HomeController::class, "profil"])->name("profil");
Route::get('/struktur', [App\Http\Controllers\HomeController::class, "struktur"])->name("struktur");

Route::get('/dosen', [App\Http\Controllers\DosenController::class, "index"])->name("dosen.index");
Route::get('/dosen/{matakuliah:slug}', [App\Http\Controllers\DosenController::class, "show"])->name("dosen.show");

Route::get('/post', [App\Http\Controllers\PostController::class, "index"])->name("post.index");
Route::get('/post/{post:slug}', [App\Http\Controllers\PostController::class, "show"])->name("post.show");

Route::get('/matakuliah', [App\Http\Controllers\MatakuliahController::class, "index"])->name("matakuliah.index");
Route::get('/matakuliah/{matakuliah:slug}', [App\Http\Controllers\MatakuliahController::class, "show"])->name("matakuliah.show");

Route::get('/login', [App\Http\Controllers\AuthController::class, "login"])->name("login")->middleware("guest");

Route::post('/login', [App\Http\Controllers\AuthController::class, "authenticate"])->name("authenticate")->middleware("guest");

Route::get('/logout', [App\Http\Controllers\AuthController::class, "logout"])->name("logout")->middleware("auth");


Route::group(["prefix" => "admin", "as" => "admin.", "middleware" => "auth"], function () {
    Route::get('/', function () {
        return redirect("/admin/post");
    })->name("index");

    Route::get("/post/slug", [App\Http\Controllers\Admin\PostController::class, "createSlug"])->name("post.slug");
    Route::get("/matakuliah/slug", [App\Http\Controllers\Admin\MatakuliahController::class, "createSlug"])->name("matakuliah.slug");

    Route::resource('/dosen', App\Http\Controllers\Admin\DosenController::class)->except("show");
    Route::resource('/matakuliah', App\Http\Controllers\Admin\MatakuliahController::class)->except("show");
    Route::resource('/struktur', App\Http\Controllers\Admin\StrukturController::class)->except("show");
    Route::resource('/post', App\Http\Controllers\Admin\PostController::class);

    Route::post("/attachment/add", [App\Http\Controllers\Admin\AttachmentController::class, "add_attachment"])->name("attachment.add");
    Route::post("/attachment/remove", [App\Http\Controllers\Admin\AttachmentController::class, "remove_attachment"])->name("attachment.remove");
});
