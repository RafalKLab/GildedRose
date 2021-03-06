<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;


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
Route::resource('categories', CategoryController::class);
Route::resource('items', ItemController::class);
Route::get('/categories/search/{name}', [CategoryController::class, 'search']);
Route::delete('/categories/delete/{name}', [CategoryController::class, 'deleteByCategory']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
