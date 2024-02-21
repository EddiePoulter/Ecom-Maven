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
        $email = $user->email;
        $phone_num = $user->phone_number;

        return view("account", compact('first_name', 'last_name', 'email', 'phone_num'));
    }

    public function update_account(Request $request){
        $username = $request->firstName . " " . $request->lastName;
        $email = $request->email;
        $conf_email = $request->confirmEmail;
        $password = $request->password;
        $conf_password = $request->confirmPassword;
        $phone_num = $request->phone;
        if ($email != $conf_email) {
            return back()->with("success", "fe");
        } else if ($password != $conf_password) {
            return back()->with("success", "fp");
        } else {
            $user = Auth::user();
            if ($user->password != "")
                $user->password = Hash::make($password);
            $user->email = $email;
            $user->name = $username;
            $user->phone_number = $phone_num;
            $user->save();
            return back()->with("success", "t");
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
