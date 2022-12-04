<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Petcontroller;
use App\Http\Controllers\Speciescontroller;
use App\Http\Controllers\PetdetailController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('login');


Route::prefix('home')->group(function () {
    Route::get('', [HomeController::class, 'home'])->name('user.home');
    Route::view('about', 'user.pages.about')->name('user.about');
    Route::view('services', 'user.pages.services')->name('user.services');
    Route::view('price', 'user.pages.price')->name('user.price');
    Route::view('booking', 'user.pages.booking')->name('user.booking');
    Route::view('blog', 'user.pages.blog')->name('user.blog');
    Route::view('single', 'user.pages.single')->name('user.single');
    Route::view('contact', 'user.pages.contact')->name('user.contact');
});

// admin
Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin.home');
    Route::prefix('pet')->group(function () {
        Route::get('', [Petcontroller::class, 'index'])->name('admin.pet');
        Route::get('create', [Petcontroller::class, 'create'])->name('admin.pet.create');
        Route::post('store', [Petcontroller::class, 'store'])->name('admin.pet.store');
        Route::get('edit/{id}/{id_species}', [Petcontroller::class, 'edit'])->name('admin.pet.edit');
        Route::post('update/{id}',[Petcontroller::class,'update'])->name('admin.pet.update');
        Route::get('delete/{id}',[Petcontroller::class,'destroy'])->name('admin.pet.delete');
    });
    Route::prefix('pet_detail')->group(function () {
        Route::get('{id}', [PetdetailController::class, 'index'])->name('admin.detail');
        Route::post('update/{id}', [PetdetailController::class, 'update'])->name('admin.detail.update');
    });
    Route::prefix('species')->group(function () {
        Route::get('', [Speciescontroller::class, 'index'])->name('admin.species');
        Route::get('create', [Speciescontroller::class, 'create'])->name('admin.species.create');
        Route::post('store', [Speciescontroller::class, 'store'])->name('admin.species.store');
        Route::get('edit/{id}', [Speciescontroller::class, 'edit'])->name('admin.species.edit');
        Route::post('update/{id}',[Speciescontroller::class,'update'])->name('admin.species.update');
        Route::get('delete/{id}',[Speciescontroller::class,'destroy'])->name('admin.species.delete');
    });
    Route::prefix('food')->group(function () {
        Route::get('', [FoodController::class, 'index'])->name('admin.food');
        Route::get('create', [FoodController::class, 'create'])->name('admin.food.create');
        Route::post('store', [FoodController::class, 'store'])->name('admin.food.store');
        Route::get('edit/{id}', [FoodController::class, 'edit'])->name('admin.food.edit');
        Route::post('update/{id}',[FoodController::class,'update'])->name('admin.food.update');
        Route::get('delete/{id}',[FoodController::class,'destroy'])->name('admin.food.delete');
    });
    Route::prefix('blog')->group(function () {
        Route::get('', [BlogController::class, 'index'])->name('admin.blog');
        Route::get('create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::post('update/{id}',[BlogController::class,'update'])->name('admin.blog.update');
        Route::get('delete/{id}',[BlogController::class,'destroy'])->name('admin.blog.delete');
    });

});