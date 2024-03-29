<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use function Laravel\Prompts\alert;

class UserController extends Controller
{
    public function signup_page() {
        return view("signup");
    }
    public function create_user(Request $request) {
        $request->validate([
            'email' => 'required|email|confirmed',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|digits:10',
            'first_name' => 'required',
        ]);

        $user = new User();
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->first_name . " " . $request->last_name;
        $user->phone_number = $request->phone;
        $user->address_line_1 = "";
        $user->address_line_2 = "";
        $user->city = "";
        $user->county = "";
        $user->postcode = "";
        $user->save();
        event(new Registered($user));
        return redirect("verify-email");
    }

    public function login(Request $request) {
        $credentials = $request->validate([
           "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->usertype == "1") {
                return redirect()->intended('redirect');
            } else {
                return redirect()->intended('account');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect',
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }

    public function account() {
        $user = Auth::user();
        [$first_name, $last_name] = User::split_name($user->name);
        $address_1 = $user->address_line_1;
        $address_2 = $user->address_line_2;
        $city = $user->city;
        $county = $user->county;
        $postcode = $user->postcode;
        $email = $user->email;
        $phone_num = $user->phone_number;
        $birthday = $user->birthday;

        return view("account", compact(
            'first_name',
            'last_name',
            'address_1',
            'address_2',
            'city',
            'county',
            'postcode',
            'email',
            'phone_num',
            'birthday',
        ));
    }

    public function update_account(Request $request){
        $request->validate([
            'email' => 'email|confirmed',
            'password' => 'nullable|min:8|confirmed',
            'phone' => 'digits:10',
            'birthday' => 'nullable|before:' . date('m/d/Y')
        ]);

        $user = Auth::user();
        if ($request->password != "") $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->firstName . " " . $request->lastName;
        $user->address_line_1 = $request->address1;
        $user->address_line_2 = $request->address2;
        $user->city = $request->city;
        $user->county = $request->county;
        $user->postcode = $request->postcode;
        $user->phone_number = $request->phone;
        $user->birthday = $request->birthday;
        $user->save();
        return redirect()->back()->with("success", "t");
    }

    public function send_reset_email(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status), 'success' => 't'])
            : back()->withErrors(['email' => __($status)]);
    }

    public function reset_password(Request $request) {
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
            ? back()->with(['status' => __($status), 'success' => 't'])
            : back()->withErrors(['email' => [__($status)]]);
    }
    public function myOrders() {
        if (auth()->check()) {
            // Get orders associated with the logged-in user, eager load order items and their associated products
            $orders = Order::where('created_by', auth()->id())
                        ->with('orderItems.product')
                        ->get();

            // Pass the orders to the view
            return view('myorders', ['orders' => $orders]);
        } else {
            // If the user is not authenticated, redirect them to the login page
            return redirect()->route('login');
        }
    }
}
