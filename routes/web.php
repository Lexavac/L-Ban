<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes Yang Sangat Meng Gege Gaming YgY
|--------------------------------------------------------------------------
|
| Semoga Kamu Ga Pusing Ya Bang Liat Route Nya Soalnya Route Nya Berantakan
| Maaf Ya !
|
|
*/


Route::get('/', function () {
    return view('landing-page.landing');
});

Route::get('/', function () {
    return view('landing-page.landing');
})->middleware(['auth', 'verified'])->name('landing-page.landing');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth', 'Admin']], function(){

    Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/rent', [App\Http\Controllers\Admin\RentController::class, 'index'])->name('rent');

    // BOOK
    Route::get('admin/book', [App\Http\Controllers\Admin\BookController::class, 'index'])->name('book');
    Route::get('admin/book/trash', [App\Http\Controllers\Admin\BookController::class, 'trash'])->name('trash');
    Route::get('admin/book/restore/{id}', [App\Http\Controllers\Admin\BookController::class, 'restore'])->name('trash-restore');
    Route::get('admin/book/force/{id}', [App\Http\Controllers\Admin\BookController::class, 'force'])->name('trash-force');
    Route::get('admin/book/create', [App\Http\Controllers\Admin\BookController::class, 'create'])->name('add');
    Route::post('admin/book/create/success', [App\Http\Controllers\Admin\BookController::class, 'store'])->name('store');
    Route::get('admin/book/edit/{id}', [App\Http\Controllers\Admin\BookController::class, 'edit'])->name('edit');
    Route::resource('/book-update', \App\Http\Controllers\Admin\BookController::class);
    Route::delete('admin/book/deleted{id}', [App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('destroy');
    Route::get('admin/book/show{id}', [App\Http\Controllers\Admin\BookController::class, 'show'])->name('show');
    Route::post('admin/book/image', [App\Http\Controllers\Admin\BookController::class, 'storeImage'])->name('storeImages');
    Route::post('checkout', [App\Http\Controllers\Admin\BookController::class, 'checkout'])->name('checkout');
    Route::get('/product/{id?}', [\App\Http\Controllers\BookController::class, 'show'])->name('related.show');

    // Category
    Route::get('admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::get('admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('add-category');
    Route::post('admin/category/create/success', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store-category');
    Route::get('admin/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit-category');
    Route::resource('/category-update', \App\Http\Controllers\Admin\CategoryController::class);
    Route::delete('admin/category/deleted{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('destroy-category');

    // Hero
    Route::get('admin/hero', [App\Http\Controllers\Admin\HeroController::class, 'index'])->name('hero');
    Route::get('admin/hero/create', [App\Http\Controllers\Admin\HeroController::class, 'create'])->name('add-hero');
    Route::post('admin/hero/create/success', [App\Http\Controllers\Admin\HeroController::class, 'store'])->name('store-hero');
    Route::get('admin/hero/edit/{id}', [App\Http\Controllers\Admin\HeroController::class, 'edit'])->name('edit-hero');
    Route::resource('/hero-update', \App\Http\Controllers\Admin\HeroController::class);
    Route::delete('admin/hero/deleted{id}', [App\Http\Controllers\Admin\HeroController::class, 'destroy'])->name('destroy-hero');
    Route::post('admin/hero/image', [App\Http\Controllers\Admin\HeroController::class, 'storeImage'])->name('storeImages-hero');

    // ABOUT
    Route::get('admin/about', [App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about');
    Route::get('admin/about/create', [App\Http\Controllers\Admin\AboutController::class, 'create'])->name('add-about');
    Route::post('admin/about/create/success', [App\Http\Controllers\Admin\AboutController::class, 'store'])->name('store-about');
    Route::get('admin/about/edit/{id}', [App\Http\Controllers\Admin\AboutController::class, 'edit'])->name('edit-about');
    Route::resource('/about-update', \App\Http\Controllers\Admin\AboutController::class);
    Route::get('admin/about/show/{id}', [App\Http\Controllers\Admin\AboutController::class, 'show'])->name('show-about');
    Route::delete('admin/about/deleted{id}', [App\Http\Controllers\Admin\AboutController::class, 'destroy'])->name('destroy-about');
    Route::post('admin/about/image', [App\Http\Controllers\Admin\AboutController::class, 'storeImage'])->name('storeImages-about');

    // TAGS
    Route::get('admin/tag', [App\Http\Controllers\Admin\TagController::class, 'index'])->name('tag');
    Route::get('admin/tag/create', [App\Http\Controllers\Admin\TagController::class, 'create'])->name('add-tag');
    Route::post('admin/tag/create/success', [App\Http\Controllers\Admin\TagController::class, 'store'])->name('store-tag');
    Route::get('admin/tag/edit/{id}', [App\Http\Controllers\Admin\TagController::class, 'edit'])->name('edit-tag');
    Route::resource('/tag-update', \App\Http\Controllers\Admin\TagController::class);
    Route::get('admin/tag/show/{id}', [App\Http\Controllers\Admin\TagController::class, 'show'])->name('show-tag');
    Route::delete('admin/tag/deleted{id}', [App\Http\Controllers\Admin\TagController::class, 'destroy'])->name('destroy-tag');

    // PRODUCT BOOK
    Route::get('admin/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
    Route::get('admin/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('add-product');
    Route::post('admin/product/create/success', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store-product');
    Route::get('admin/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit-product');
    Route::resource('/product-update', \App\Http\Controllers\Admin\ProductController::class);
    Route::delete('admin/product/deleted{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy-product');
    Route::post('admin/product/image', [App\Http\Controllers\Admin\ProductController::class, 'storeImage'])->name('storeImages-product');

    // USER
    Route::get('admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
    Route::get('admin/status/{user_id}/{status_code}', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('up-status-user');


});

Route::middleware('auth')->group(function () {

    // USER
    Route::get('admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
    Route::get('admin/status/{user_id}/{status_code}', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('up-status-user');
});


// Landing Page
Route::get('/home', [App\Http\Controllers\LandingController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('home');
Route::get('book/details/', [App\Http\Controllers\LandingController::class, 'detail'])->name('book-detail');
Route::get('success/rent/{id}', [App\Http\Controllers\LandingController::class, 'success'])->name('success-rent');

// Test Laravel Crud
Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product-create');
Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product-store');
Route::get('/product/edit', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product-edit');
Route::resource('/product-update', \App\Http\Controllers\Admin\ProductController::class);
Route::get('/product/destroy', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy-product');



// API Payment
Route::get('admin/book/checkout/{id}', [App\Http\Controllers\Admin\BookController::class, 'checkout'])->name('checkout');
Route::get('checkout/transaction/{reference}', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction.detail');
Route::post('checkout/transaction', [App\Http\Controllers\TransactionController::class, 'store'])->name('transaction-store');

Route::post('/callback', [App\Http\Controllers\TripayCallbackController::class, 'handle']);

// Detail Book
Route::get('detail/{id}', [App\Http\Controllers\BookController::class, 'show'])->name('detail-books');
Route::post('detail/rent', [App\Http\Controllers\BookController::class, 'store'])->name('rent-store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
