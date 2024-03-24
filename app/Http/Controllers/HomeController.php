<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
        return view('home.userpage');
    }
    public function redirect(){
        $usertype = "0";
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
        }

        if($usertype== "1"){
            $total_product=product::all()-> count();

            $name = Auth::user()->name;

            $total_user=user::all()-> count();
            return view('admin.home',compact('total_product','total_user', 'name'));

    }

    else{
        return redirect()->to('/');
    }
}

}
