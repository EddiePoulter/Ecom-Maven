<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $username = $request->first_name . " " . $request->last_name;
        $email = $request->email;
        $conf_email = $request->confirm_email;
        $password = $request->password;
        $conf_password = $request->confirm_password;
        $phone_num = $request->phone;
        if ($email != $conf_email || $password != $conf_password) {
            return redirect("signup")->with("status", "Something went wrong...\nPlease check details and try again");
        } else {
            $user = new User();
            $user->password = Hash::make($password);
            $user->email = $email;
            $user->name = $username;
            $user->phone_number = $phone_num;
            $user->address_line_1 = "";
            $user->address_line_2 = "";
            $user->city = "";
            $user->county = "";
            $user->postcode = "";
            $user->save();
            event(new Registered($user));
            return redirect("verify-email");
        }
    }

    public function login(Request $request) {
        $credentials = $request->validate([
           "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('account');
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
        $username = $request->firstName . " " . $request->lastName;
        $address_1 = $request->address1;
        $address_2 = $request->address2;
        $city = $request->city;
        $county = $request->county;
        $postcode = $request->postcode;
        $email = $request->email;
        $conf_email = $request->confirmEmail;
        $password = $request->password;
        $conf_password = $request->confirmPassword;
        $phone_num = $request->phone;
        $birthday = $request->birthday;
        if ($email != $conf_email) {
            return back()->with("success", "fe");
        } else if ($password != $conf_password) {
            return back()->with("success", "fp");
        } else {
            $user = Auth::user();
            if ($password != "") $user->password = Hash::make($password);
            $user->email = $email;
            $user->name = $username;
            $user->address_line_1 = $address_1;
            $user->address_line_2 = $address_2;
            $user->city = $city;
            $user->county = $county;
            $user->postcode = $postcode;
            $user->phone_number = $phone_num;
            $user->birthday = $birthday;
            $user->save();
            return redirect()->back()->with("success", "t");
        }
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
}
