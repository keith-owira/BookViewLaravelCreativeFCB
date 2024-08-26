<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;



//Public Routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/users',[AuthController::class,'index']);
Route::get('/users/{id}',[AuthController::class,'show']);
Route::get('/users/search/{name}', [AuthController::class,'search']);

Route::get ('/books',[BookController::class,'index']);
Route::get('/books/search/{name}', [BookController::class,'search']);
Route::get ('/books/{id}',[BookController::class,'show']);

Route::post ('/books',[BookController::class,'store']);
Route::put ('/books/{id}',[BookController::class,'update']);
Route::delete ('/books/{id}',[BookController::class,'destroy']);


Route::group(['middleware'=>['auth:sanctum']],function (){

    Route::post('/logout',[AuthController::class,'logout']);
    //Users Routes
    Route::put('/editUser/{id}',[AuthController::class,'update']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
