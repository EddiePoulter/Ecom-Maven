<?php

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('index');
})->name('index');

Route::get("/about/", function () {
    return view("about");
})->name('about');

Route::get("/account/", function () {
    return view("account");
})->middleware(["auth", "verified"]);

Route::get("/basket/", function () {
    return view("cart");
})->name('cart');

Route::get("/contact/", function () {
    return view("contact");
})->name('contact');

// Corrected route for displaying products using the ProductController's index method
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get("/login/", function () {
    return view("login");
})->name('login');
Route::post("/signin", [UserController::class, "login"]);

Route::get("/logout/", [UserController::class, "logout"]);

Route::get("/signup/", [UserController::class, "signup_page"])->name('signup');
Route::post("/register", [UserController::class, "create_user"]);

Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get("/verify-email", function () {
    return view("verify-email");
});

Route::get("/checkout/", function () {
    return view("checkout");
})->name('checkout');


Route::get('/dashboard', [ProductController::class, 'index']);
Route::get('/shopping-cart', [ProductController::class, 'productCart'])->name('shopping.cart');
Route::get('/product/{id}', [ProductController::class, 'addProducttoCart'])->name('addProduct.to.cart');
Route::patch('/update-shopping-cart', [ProductController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [ProductController::class, 'deleteProduct'])->name('delete.cart.product');
