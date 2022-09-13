<?php

use Illuminate\Support\Facades\Route;
use pp\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Models\Product;
use App\Models\News;


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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/news', function(){
    return view('index');
});

Route::get('/news/edit/{id}', function($id){
    $post = News::where("id","=","$id")->get();
    return view('news.edit',['news' => $post]);
 
});
Route::get('/news/edit',[NewsController::class,'edit']);
Route::get('/',[ProductController::class,'index']);
Route::resource('news', 'App\Http\Controllers\NewsController');




