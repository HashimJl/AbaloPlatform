<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/isloggedin', [App\Http\Controllers\AuthController::class, 'isloggedin'])->name('haslogin');


Route::get('/', function () {
    return view('home');
});

Route::get('/testdata',
    [\App\Http\Controllers\AbTestDataController::class,'index']);

Route::get('/categories', [
    \App\Http\Controllers\CategoryController::class, 'index'
]);

Route::controller(\App\Http\Controllers\ArticleController::class)->group(function () {
    Route::get('articles/{searchterm}','getArticle');
    Route::get('articles', 'getAllArticles');
    Route::post('articles','newArticle');
});

Route::get('/newarticle', function () {
    return view('newarticle');
});




