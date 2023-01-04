<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource(
    'articles',
    App\Http\Controllers\Api\ArticleController::class
);
Route::apiResource(
    'comments',
    App\Http\Controllers\Api\CommentController::class
);
Route::apiResource('tags', App\Http\Controllers\Api\TagController::class);
Route::apiResource('users', App\Http\Controllers\Api\UserController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
