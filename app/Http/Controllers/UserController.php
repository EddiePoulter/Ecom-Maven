<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
//            DB::table("users")->insert([
//                "name" => $username,
//                "email" => $email,
//                "password" => $password,
//                "phone_number" => $phone_num,
//            ]);
            $user = new User();
            $user->password = Hash::make($password);
            $user->email = $email;
            $user->name = $username;
            $user->phone_number = $phone_num;
            $user->save();
            event(new Registered($user));
//            auth()->login($user);
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
}
