<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
/*Route::get('articles/{searchterm}',[
    \App\Http\Controllers\ArticleController::class, 'getArticle_api'
]);
*/

Route::get('articles/{id}', [
    \App\Http\Controllers\ArticleController::class, 'getArticleID_api'
]);

Route::delete('articles/{id}/delete', [
    \App\Http\Controllers\ArticleController::class, 'deleteArticle_api'
]);
