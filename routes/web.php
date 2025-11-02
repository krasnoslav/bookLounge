<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Для всех посетителей сайта
Route::get('/', [AboutController::class, 'index'])->name('about');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/catalog', [CatalogController::class, 'getBooks'])->name('catalog');
Route::get('/book/{id}', [BookController::class, 'index'])->name('book');

// Только для авторизованных пользователей
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/changeqty/{param}/{id}', [CartController::class, 'changeQty']);
    Route::get('/create-order', [OrderController::class, 'index'])->name('create-order');
    Route::post('/create-order', [OrderController::class, 'createOrder']);
});

// Только для админов
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/book-create', [BookController::class, 'createBookView']); // Create
    Route::post('/book-create', [BookController::class, 'createBook']); // Create
    Route::get('/books', [BookController::class, 'getBooks'])->name('admin.books'); // Read
    Route::get('/book-edit/{id}', [BookController::class, 'getBookById']); // Update
    Route::patch('/book-update/{id}', [BookController::class, 'editBook']); // Update
    Route::delete('/book-delete/{id}', [BookController::class, 'deleteBook']); // Delete

    Route::get('/genre-create', [GenreController::class, 'createGenreView']); // Create
    Route::post('/genre-create', [GenreController::class, 'createGenre']); // Create
    Route::get('/genres', [GenreController::class, 'getGenres'])->name('admin.genres'); // Read
    Route::get('/genre-edit/{id}', [GenreController::class, 'getGenreById']); // Update
    Route::patch('/genre-update/{id}', [GenreController::class, 'editGenre']); // Update
    Route::delete('/genre-delete/{id}', [GenreController::class, 'deleteGenre']); // Delete

    Route::get('/orders', [OrderController::class, 'getOrders'])->name('admin.orders'); // Read
    Route::patch('/order-status/{action}/{number}', [OrderController::class, 'editOrderStatus']); // Update
});

require __DIR__.'/auth.php';