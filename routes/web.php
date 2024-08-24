<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CreateStore;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [FrontEndController::class,  'home'])->name('home');
Route::get('/all-products', [FrontEndController::class,  'allProducts'])->name('all-product');
Route::get('/all-restaurants', [FrontEndController::class,  'allRestaurants'])->name('allRestaurants');
Route::get('/product/{id}', [FrontEndController::class,  'product'])->name('product');
Route::get('/restaurant/{id}', [FrontEndController::class,  'restaurant'])->name('restaurant');

// Search
Route::get('/search/{query}', [FrontEndController::class,  'search'])->name('search');
Route::get('/search', [FrontEndController::class,  'searchSuggession'])->name('search.suggestion');

// Offers
Route::get('/offers', [OfferController::class,  'offerPage'])->name('offers.all');
Route::get('/offers/{id}', [OfferController::class,  'offerSingle'])->name('offers.single');
Route::post('/offers', [OfferController::class,  'offerSingle'])->name('offers.filter');

// Google Sign-In (if using Socialite)
Route::get('/user/login', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/logout', [GoogleController::class, 'logout'])->name('user.logout');
Route::get('/profile', [GoogleController::class, 'profile'])->name('profile');

// Admin Login
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])
->name('login');
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store']);


// Dashboard
Route::middleware([CheckRole::class])->group(function(){
    Route::get('/dashboard/{page}', [AdminController::class, 'index']);
    Route::get('/dashboard/{page}/{subpage?}', [AdminController::class, 'index']);

    // Register New Admin
    Route::get('/admin/register', [RegisteredUserController::class, 'create'])
    ->name('register');
    Route::post('/admin/register', [RegisteredUserController::class, 'store']);

    // Products CRUD
    Route::post('/store/products/', [ProductController::class, 'store'])->name('store.product');
    Route::post('/update/products/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::delete('/delete/products/{id}', [ProductController::class, 'destroy'])->name('destroy.product');

    // Companies CRUD
    Route::post('/store/company/', [CompaniesController::class, 'store'])->name('store.company');
    Route::post('/update/company/{id}', [CompaniesController::class, 'update'])->name('companies.update');
    Route::delete('/delete/company/{id}', [CompaniesController::class, 'destroy'])->name('company.destroy');
    // Category CRUD
    Route::post('/store/category/', [CompaniesController::class, 'storeCategory'])->name('store.category');
    Route::post('/update/category/{id}', [CompaniesController::class, 'updateCategory'])->name('update.category');
    Route::delete('/delete/category/{id}', [CompaniesController::class, 'destroyCategory'])->name('category.destroy');
    
    // Offers CRUD
    Route::post('/store/offers/', [OfferController::class, 'offerStore'])->name('store.offer');
    Route::post('/update/offers/{id}', [OfferController::class, 'offerUpdate'])->name('update.offers');
    Route::delete('/delete/offers/{id}', [OfferController::class, 'destroyOffer'])->name('destroy.offer');
});


Route::middleware(['auth'])->group(function () {
// Create-Store
Route::post('/create-store', [CreateStore::class,'create_name'])->name('create.store');
Route::get('/create-store/{slug}', [CreateStore::class,'add_store_page'])->name('addstore.view');
Route::post('/create-store/{slug}', [CreateStore::class,'add_store_img'])->name('add.store.image');
Route::post('/create-store/{slug}/update-info', [CreateStore::class,'update_store_info'])->name('update.store.info');
// Add Product
Route::post('/create-store/{slug}/add-product', [CreateStore::class,'add_product'])->name('add.product');
Route::delete('/create-store/{slug}/delete-product', [CreateStore::class,'delete_product'])->name('delete.seller.product');
Route::post('/create-store/{slug}/update-product', [CreateStore::class,'update_product'])->name('update.seller.product');


// Add Review
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

});


// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
