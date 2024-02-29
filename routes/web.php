<?php

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;

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

Route::get("/account/",[UserController::class, "account"])->middleware(["auth", "verified"])->name('account');
Route::post("/account", [UserController::class, "update_account"]);

Route::get("/basket/", function () {
    return view("cart");
})->name('cart');
// Basket Functionalities
Route::post('/basket/decrease-quantity/{id}', [ProductController::class, 'removeProductFromCart'])->name('removeProduct.from.cart');
Route::post('/basket/increase-quantity/{id}', [ProductController::class, 'addProducttoCart'])->name('addProduct.to.cart');

Route::get("/contact/", function () {
    return view("contact");
})->name('contact');

// Corrected route for displaying products using the ProductController's index method
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get("/login/", function () {
    return view("login");
})->name('login');
Route::post("/signin", [UserController::class, "login"]);

Route::get("/logout/", [UserController::class, "logout"])->name('logout');

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

Route::get('/contactform', function () {
    return view('contactform');
});


Route::get('/forgot-password', function () {
    return view('forgotPassword');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', [UserController::class, "send_reset_email"])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('resetPassword', ['token' => $token, 'email' => request()->query("email")]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [UserController::class, "reset_password"])->middleware('guest')->name('password.update');

Route::get("/checkout/", function () {
    return view("checkout");
})->name('checkout');


Route::get('/dashboard', [ProductController::class, 'index']);
Route::get('/shopping-cart', [ProductController::class, 'productCart'])->name('shopping.cart');
Route::get('/product/{id}/add-to-cart', [ProductController::class, 'addProducttoCart'])->name('addProduct.to.cart');
Route::get('/product/{id}', [ProductController::class, 'showProduct'])->name('product.show');
Route::get('/random-products', [ProductController::class, 'showRandomProducts'])->name('random.products');
Route::post('/product/{id}/add-to-cart', [ProductController::class, 'addToCart'])->name('addProduct.to.cart');

Route::patch('/update-shopping-cart', [ProductController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [ProductController::class, 'deleteProduct'])->name('delete.cart.product');
Route::get('/checkout/', [ProductController::class, 'checkout'])->name('checkout');


Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');


