<?php

use App\Http\Controllers\{CartItemsController, CategoryController, ProductController};
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('cart-items', CartItemsController::class);

//Route::prefix('products')->group(function (){
//    Route::get('/',[ProductController::class, 'index']);
//    Route::get('{id}',[ProductController::class, 'show']);
//    Route::post('/',[ProductController::class, 'store']);
//    Route::put('{id}',[ProductController::class, 'update']);
//    Route::delete('{id}',[ProductController::class, 'destroy']);
//});
//
//Route::prefix('categories')->group(function (){
//    Route::get('/',[ProductCategoryController::class, 'index']);
//    Route::get('{id}',[ProductCategoryController::class, 'show']);
//    Route::post('/',[ProductCategoryController::class, 'store']);
//    Route::put('{id}',[ProductCategoryController::class, 'update']);
//    Route::delete('{id}',[ProductCategoryController::class, 'destroy']);
//});
//
//Route::prefix('cart-items')->group(function (){
//    Route::get('/',[CartItemsController::class, 'index']);
//    Route::get('{id}',[CartItemsController::class, 'show']);
//    Route::post('/',[CartItemsController::class, 'store']);
//    Route::put('{id}',[CartItemsController::class, 'update']);
//    Route::delete('{id}',[CartItemsController::class, 'destroy']);
//});
