<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\alert;

class UserController extends Controller
{
    public function signup_page() {
        return view("signup");
    }
    public function create_user(Request $request) {
        $username = $request->username;
        $email = $request->email;
        $conf_email = $request->confirm_email;
        $password = $request->password;
        $conf_password = $request->confirm_password;
        $phone_num = $request->phone;
        if ($email != $conf_email || $password != $conf_password) {
            return redirect("signup")->with("status", "Something went wrong...\nPlease check details and try again");
        } else {
            DB::table("users")->insert([
                "name" => $username,
                "email" => $email,
                "password" => $password,
                "phone_number" => $phone_num,
            ]);
            return redirect("signup_success");
        }
    }
}
