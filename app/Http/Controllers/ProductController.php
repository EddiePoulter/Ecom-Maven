<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(); // Paginate all available products
        return view('products', compact('products'));
    }
  
    public function productCart()
    {
        $cart = session()->get('cart', []);
        $products = collect([]); // Initialize an empty collection
    
        if (!empty($cart)) {
            $products = Product::find(array_keys($cart));
        }
    
        return view('cart', compact('products', 'cart'));
    }
    public function showProduct($id)
    {
    $product = Product::findOrFail($id);
    return view('product', compact('product'));
    }

    public function getRandomProducts($count)
    {
        return Product::inRandomOrder()->take($count)->get();
    }
    
    public function addProducttoCart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            // Increase Product Quantity
            $cart[$id]['quantity']++;
        } else {
            // Add Product To Cart
            $cart[$id] = [
                "is" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "description" => $product->description,
                "image_path" => $product->image_path
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }
    public function removeProductFromCart($id){
        // Decrease Product Quantity
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']--; 
        } 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been removed from cart!');
    }
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Product added to cart.');
        }
    }
  
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted.');
        }
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $products = collect([]); // Initialize an empty collection
    
        if (!empty($cart)) {
            $products = Product::find(array_keys($cart));
        }
    
        return view('checkout', compact('products', 'cart'));
    }
    
}
