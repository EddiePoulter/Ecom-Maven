<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
            $total_order = Order::all()->count();
            $accepted_orders = Order::where('status', 'Accepted')->get();
            $total_revenue = 0;
            foreach ($accepted_orders as $order) {
                $total_revenue += $order->total_price;
            }

            $name = Auth::user()->name;

            $total_user=user::all()-> count();
            return view('admin.home',compact('total_product','total_user', 'name', 'total_order', 'total_revenue'));

    }

    else{
        return redirect()->to('/');
    }
}

}
