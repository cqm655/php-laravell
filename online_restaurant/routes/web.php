<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController; //adaugam pth to productsControler
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [MainController::class, 'index']);
Route::get('/about',[MainController::class, 'about']);
Route::get('/shop', [productsController::class,'index' ]);
Route::get('/shop', [productsController::class, 'store']);
Route::get('/shop/create', [productsController::class, 'create']);
Route::get('/shop/{product_id}', [productsController::class, 'show']);

