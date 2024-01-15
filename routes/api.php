<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableListController;
use App\Http\Controllers\ProListController;
use App\Http\Controllers\ProductListController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });Route::post('register', [UserController::class, 'register']);
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout']);

Route::controller(TableListController::class)->group(function () {
    Route::get('TableList', 'index');
    Route::get('TableList/edit/{id}', 'edit');
    Route::post('TableList/add', 'add');
    Route::post('TableList/update/{id}', 'update');
    Route::delete('TableList/delete/{id}', 'delete');
});
Route::controller(ProListController::class)->group(function () {
    Route::get('ProList', 'index');
    Route::get('ProList/edit/{id}', 'edit');
    Route::post('ProList/add', 'add');
    Route::post('ProList/update/{id}', 'update');
    Route::delete('ProList/delete/{id}', 'delete');
    // Route::get('ProList/initem', 'initem');
});
Route::controller(ProductListController::class)->group(function () {
    Route::get('ProductList', 'index');
    // Route::get('ProductList/edit/{id}', 'edit');
    Route::post('ProductList/add', 'add');
    // Route::post('ProductList/update/{id}', 'update');
    // Route::delete('ProductList/delete/{id}', 'delete');
    Route::get('ProductList/initem', 'initem');
});