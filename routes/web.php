<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $u =User::all();
    $c = Category::all();
    $p = Product::all();
    return view('dashboard',compact('u','c','p'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// เมนู User
Route::get('admin/user/index',[UserController::class, 'index'])->name('u.index');

// เมนู Category
Route::get('admin/category/index',[CategoryController::class, 'index'])->name('u.category');
Route::get('admin/category/createfrom',[CategoryController::class, 'createfrom'])->name('c.createfrom');
Route::get('admin/category/edit/{id}',[CategoryController::class, 'edit']);
Route::post ('admin/category/insert',[CategoryController::class, 'insert']);
Route::post('admin/category/update{id}',[CategoryController::class, 'update']);
Route::get('admin/category/delete{id}',[CategoryController::class, 'delete']);
//->name('u.edit');

//เมนู Product
Route::get('admin/product/index',[ProductController::class, 'index'])->name('u.product');
Route::get('admin/product/createfrom',[ProductController::class, 'createfrom'])->name('u.createfrom');
Route::get('admin/product/edit/{id}',[ProductController::class, 'edit']);
Route::post('admin/product/insert',[ProductController::class, 'insert']);
Route::post('admin/product/update/{id}',[ProductController::class, 'update']);
Route::get('admin/product/delete/{id}',[ProductController::class, 'delete']);
