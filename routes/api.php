<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController ; 



Route::get('/article' , [ArticleController::class , 'index']) ; 



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();

Route::post('/article/create' , [ArticleController::class, 'store']) ; 
Route::put('/article/edit/{article}', [ArticleController::class ,'update']) ;
Route::delete('/article/{article}' , [ArticleController::class , 'delete']) ; 
    
});


require __DIR__.'/auth.php';
