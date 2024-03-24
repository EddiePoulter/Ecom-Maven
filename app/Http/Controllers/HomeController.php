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
        $usertype=Auth::user()->usertype;

        if($usertype== "1"){
            $total_product=product::all()-> count();



            $total_user=user::all()-> count();
            return view('admin.home',compact('total_product','total_user'));

    }

    else{
        return redirect()->to('account');
    }
}

}
