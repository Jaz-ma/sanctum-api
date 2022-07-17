<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product; use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Public Routes
// Route::apiResource('products', ProductController::class);
Route::get('products',[ProductController::class,'index']);
Route::get('products/{product}',[ProductController::class,'show']);
Route::get('products/search/{name}', [ProductController::class,'search']);
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

//Protected Routes
Route::group(['middleware' => 'auth:sanctum'],function(){
Route::post('products',[ProductController::class,'show']);
Route::delete('products/{product}',[ProductController::class,'destroy']);
Route::put('products/{product}',[ProductController::class,'update']);
Route::post('logout',[AuthController::class,'logout']);


});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
