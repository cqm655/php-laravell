<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

    
// CRUD pages routes
Route::get('/product-create', [ProductController::class, 'create'])->name('product.create');
Route::post('/add-product', [ProductController::class, 'store']);
Route::get('/product-show/{id}', [ProductController::class, 'productShow'])->name('product.show');
Route::post('/product-edit', [ProductController::class, 'editPage'])->name('product.editPage');

// End crud pages routes

// All products from DB
Route::get('/all-products',[ProductController::class,'productDB'])->name('allProducts');


// CRUD operations routes
Route::get('/product-images/{id}',[ProductController::class, 'images'])->name('product.images');
Route::post('/product-delete',[ProductController::class, 'delete'])->name('product.delete');
Route::post('/product-update',[ProductController::class, 'update'])->name('product.update');
Route::post('/search',[ProductController::class, 'search'])->name('product.search');
// End crud operations routes

// Main page route
Route::get('/', [ProductController::class, 'catalog'])->name('product.catalog');
Route::get('/products-all',[ProductController::class, 'allProducts'], 'allProducts')->name('product.allProducts');



