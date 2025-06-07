<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController ;





Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//les routes protéges
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('/articles',ArticleController::class)->except(['index','show']);
});

Route::apiResource('/users', \App\Http\Controllers\UserController::class)->except(['store','update','destroy']);

Route::get('/articles',[ArticleController::class,'index']);
Route::get('/articles/{id}',[ArticleController::class,'show']);


require __DIR__.'/auth.php';
