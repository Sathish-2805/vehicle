<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;


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





//Route::resource('categories', CategoryController::class);
//Route::resource('posts', PostController::class);

// Home or Default Route
Route::get('/', function () {
    return redirect()->route('categories.index');
});

// Category Routes
Route::prefix('categories')->name('categories.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::get('/', [CategoryController::class, 'index'])->name('index'); // List all categories
    Route::get('/create', [CategoryController::class, 'create'])->name('create'); // Form to create category
    Route::post('/', [CategoryController::class, 'store'])->name('store'); // Store category
    Route::get('/{category}', [CategoryController::class, 'show'])->name('show'); // Show single category
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit'); // Form to edit category
    Route::put('/{category}', [CategoryController::class, 'update'])->name('update'); // Update category
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy'); // Delete category
});

// Post Routes
Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index'); // List all posts
    Route::get('/create', [PostController::class, 'create'])->name('create'); // Form to create post
    Route::post('/', [PostController::class, 'store'])->name('store'); // Store post
    Route::get('/{post}', [PostController::class, 'show'])->name('show'); // Show single post
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit'); // Form to edit post
    Route::put('/{post}', [PostController::class, 'update'])->name('update'); // Update post
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy'); // Delete post
});