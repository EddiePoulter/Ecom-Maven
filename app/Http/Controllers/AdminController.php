<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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




}
