<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Str;

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
})->middleware(["auth", "verified"])->name('account');

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

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

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
Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');



