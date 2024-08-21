<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/home', [App\Http\Controllers\Admin\DashboardController::class,'index']);
    


    Route::get('/products', [ProductController::class,'index']);
    Route::get('/add-product', [ProductController::class,'create']);
    Route::post('/insert-product', [ProductController::class,'store']);
    Route::get('show-product/{id}', [ProductController::class,'show']);
    Route::get('/edit-product/{id}', [ProductController::class,'edit']);
    Route::put('/update-product/{id}', [ProductController::class,'update']);
    Route::get('/delete-product/{id}', [ProductController::class,'destroy']);
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    


  
 });