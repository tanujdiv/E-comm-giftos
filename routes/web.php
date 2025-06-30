<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'home']);
Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);


Route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);

Route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);

Route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);

Route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);

Route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);

Route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);

Route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);

Route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);

Route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);

Route::get('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);

Route::post('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);

Route::get('product_search/',[AdminController::class,'product_search'])->middleware(['auth','admin']);

Route::get('product_details/{id}',[HomeController::class,'product_details']);

Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);

Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);

Route::get('delete_cart/{id}',[HomeController::class,'delete_cart'])->middleware(['auth', 'verified']);

Route::post('comfirm_order',[HomeController::class,'comfirm_order'])->middleware(['auth', 'verified']);

Route::get('view_order',[AdminController::class,'view_order'])->middleware(['auth', 'admin']);

Route::get('on_the_way/{id}',[AdminController::class,'on_the_way'])->middleware(['auth', 'admin']);

Route::get('delivered/{id}',[AdminController::class,'delivered'])->middleware(['auth', 'admin']);

Route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])->middleware(['auth', 'admin']);

Route::get('my_order',[HomeController::class,'my_order'])->middleware(['auth', 'verified']);

Route::get('payment/{value}',[HomeController::class,'payment'])->middleware(['auth', 'verified']);

Route::get('shop',[HomeController::class,'shop']);

Route::get('why',[HomeController::class,'why']);

Route::get('testimonial',[HomeController::class,'testimonial']);

Route::get('contact',[HomeController::class,'contact']);
