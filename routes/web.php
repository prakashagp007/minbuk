<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LanguageController;

// Home
Route::get('/', [FrontendController::class, 'home']);

// Dashboard Home (show categories)
Route::get('/admin', [DbController::class, 'home'])->name('admin.db_home');

// Category CRUD
Route::post('/admin/categories/store', [DbController::class, 'store'])->name('admin.categories.store');
Route::get('/category/{id}/edit', [DbController::class, 'categoryEdit'])->name('category.edit');
Route::put('/category/{id}', [DbController::class, 'categoryUpdate'])->name('category.update');
Route::delete('/category/{id}', [DbController::class, 'categoryDelete'])->name('category.delete');


// language





Route::post('/languages', [DbController::class, 'lstore'])->name('language.store');
Route::get('/languages/{id}/edit', [DbController::class, 'ledit'])->name('language.edit');
Route::put('/languages/{id}', [DbController::class, 'lupdate'])->name('language.update');
Route::delete('/languages/{id}', [DbController::class, 'ldestroy'])->name('language.delete');



Route::prefix('admin')->group(function () {
    Route::post('/books/store', [DbController::class, 'bookstore'])->name('admin.books.store');
    Route::get('/books/{id}/edit', [DbController::class, 'bookedit'])->name('admin.books.edit');
    Route::put('/books/{id}', [DbController::class, 'bookupdate'])->name('admin.books.update');
    Route::delete('/books/{id}', [DbController::class, 'bookdestroy'])->name('admin.books.destroy');
});


// Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');


//

Route::get('/allbooks',[BookController::class, 'allbooks'])->name('allbooks');



Route::get('/all-books', [BookController::class, 'allbooks'])->name('books.index');
