<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () { // for this i have changed the route ('/dashboard') to /login in RouteServiceProvider.php
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// admin routes

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    // product routes start
    // Route::get('/product-details/{slug}', [ProductController::class, 'productDetail'])->name('products.detail');

    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::get('/products-add', [ProductController::class, 'show'])->name('product.add');

    Route::post('/products-add', [ProductController::class, 'store'])->name('product.store');

    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

    Route::post('/product-edit/{id}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/product-delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    // banners routes start
    Route::get('/banners', [BannerController::class, 'index'])->name('banners');

    Route::get('/banners-add', [BannerController::class, 'show'])->name('banner.add');

    Route::post('/banners-add', [BannerController::class, 'store'])->name('banner.store');

    Route::get('/banner-edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');

    Route::post('/banner-edit/{id}', [BannerController::class, 'update'])->name('banner.update');

    Route::get('/banner-delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');

    // category routes start 
    // Route::get('/category-shop/{slug}', [CategoryController::class, 'categoryShop'])->name('categories.shop');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

    Route::get('/categories-add', [CategoryController::class, 'show'])->name('category.add');

    Route::post('/categories-add', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

    Route::post('/category-edit/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/category-delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // category routes start 

    // Route::get('/blog/{slug}', [BlogController::class, 'blogShop'])->name('blogs.shop');

    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

    Route::get('/blogs-add', [BlogController::class, 'show'])->name('blog.add');

    Route::post('/blogs-add', [BlogController::class, 'store'])->name('blog.store');

    Route::get('/blog-edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');

    Route::post('/blog-edit/{id}', [BlogController::class, 'update'])->name('blog.update');

    Route::get('/blog-delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');

    // orders route start
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
});

Route::get('/blog/{slug}', [BlogController::class, 'blogShop'])->name('blogs.shop');
Route::get('/product-details/{slug}', [ProductController::class, 'productDetail'])->name('products.detail');
Route::get('/category-shop/{slug}', [CategoryController::class, 'categoryShop'])->name('categories.shop');
Route::get('/product-detail/{id}', [HomeController::class, 'wishlist'])->name('product.detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Main page routes
Route::get('/', [HomeController::class, 'index'])->name('index');

//cart routes
Route::post('/remove-addtocart', [CartController::class, 'removeAddToCart'])->name('remove.addtocart');

Route::post('/update-qty', [CartController::class, 'updateQuantity'])->name('update.qty');

Route::post('user/add-to-cart', [CartController::class, 'addToCart'])->name('add.cart');

Route::get('/shop-cart', [CartController::class, 'shopCart'])->name('shop-cart');
Route::get('/get-cart-count', [CartController::class, 'getCartCount']);

//wishlist routes
Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');

Route::post('user/wishlist', [WishlistController::class, 'addWishlist'])->name('add.wishlist');

Route::post('/remove-wishlist', [WishlistController::class, 'removeWishlist'])->name('remove.wishlist');

Route::get('/get-wishlist-count', [WishlistController::class, 'getWishlistCount']);



//checkout routes
Route::post('/shop-checkout-1', [CheckoutController::class, 'shopCheckout'])->name('shop-checkout');

Route::post('/shop-checkout', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');

Route::get('/myprofile/{id}', [HomeController::class, 'profileHandle'])->name('profile');

Route::get('/address', [HomeController::class, 'Address'])->name('add.address');

Route::post('/address', [HomeController::class, 'storeAddress'])->name('store.address');

Route::get('/orderlist', [HomeController::class, 'orderList'])->name('order.list');

Route::get('/order-detail/{id}', [HomeController::class, 'orderDetail'])->name('order-detail');

// home routes for main page 
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::get('/blog', [BlogController::class, 'showBlogs'])->name('blog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/return', function () {
    return view('return');
})->name('return');

Route::get('/shop-details', function () {
    return view('shop-details');
})->name('shop-details');

Route::get('/thank-you-order', function () {
    return view('thank-you-order');
})->name('thank-you-order');

Route::get('/track-order', function () {
    return view('track-order');
})->name('track-order');

Route::get('/user-profile', function () {
    return view('user-profile');
})->name('user-profile');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/add-address', function () {
    return view('add-address');
})->name('add-address');

Route::get('/address-list', function () {
    return view('address-list');
})->name('address-list');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/order-list', function () {
    return view('order-list');
})->name('order-list');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');

// Route::get('/register', function () {
//     return view('register');
// })->name('register');

// Route::post('/register', [RegisteredUserController::class, 'store'])->name('register1');

require __DIR__ . '/auth.php';
