<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        $name = Auth::user()->name;
        return view('admin.category', compact('data', 'name'));
    }

    public function add_category(Request $request)
    {
        $data = new category;

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category added successfully');

    }

    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Succesfully');
    }

    public function view_product()
    {
        $category=category::all();
        $name = Auth::user()->name;
        return view('admin.product',compact('category', 'name'));
    }

    public function add_product(Request $request)
    {

        $product=new product;

        $product->name=$request->title;

        $product->description=$request->description;

        $product->price=$request->price;

        $product->stock=$request->quantity;

        $product->discount_price=$request->dis_price;

        $product->category=$request->category;

        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image_path=$imagename;


        $product->save();

        return redirect()->back()->with('message','Product Added Succesfully');



    }

    public function show_product()
    {
        $product=product::all();
        $name = Auth::user()->name;
        return view('admin.show_product',compact('product', 'name'));
    }

    public function delete_product($id){

        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted succesfully');

    }

    public function update_product(){

        $product=product::find(request()->id);

        $category=category::all();
        $name = Auth::user()->name;

        return view('admin.update_product',compact('product','category', 'name'));

    }

    public function update_product_confirm(Request $request,$id){

        $product=product::find($id);



        $product->name=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->category=$request->category;
        $product->stock=$request->quantity;
        $image=$request->image;

        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);

            $product->image=$imagename;


        }




        $product->save();
        return redirect()->back()->with('message','Product Updated Successfully');


    }

    function view_orders() {
        $name = Auth::user()->name;
        $orders = Order::all();
        return view('admin.orders', compact('name', 'orders'));
    }

    function reject_order(int $id) {
        $order = Order::where('id', $id)->get()[0];
        $order->status = "Rejected";
        $order->save();
        return redirect()->back();
    }

    function accept_order(int $id) {
        $order = Order::where('id', $id)->get()[0];
        $order->status = "Accepted";
        $order->save();
        $order_items = OrderItem::where('order_id', $id)->get();
        $msgs = [];
        foreach ($order_items as $item) {
            $quantity = $item->quantity;
            $product = Product::where('id', $item->product_id)->get()[0];
            $product->stock -= $quantity;
            if ($product->stock < 5) {
                $msgs = ["less than 5 " . $product->name . " left"];
            }
            $product->save();
        }

        return redirect()->back()->with(['msgs' => $msgs]);
    }
}
