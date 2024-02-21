<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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

    public function addProducttoCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "description" => $product->description
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
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

        $user = Auth::user();
        $name = $user->name;
        $email = $user->email;
        $phone_num = $user->phone_number;

        if (str_contains($name, ' ')) {
            $name_array = explode(' ', $name);
            $first_name = $name_array[0];
            $last_name = join(' ', array_slice($name_array, 1));
        } else {
            $first_name = $name;
            $last_name = '';
        }

        return view('checkout', compact('products', 'cart', 'first_name', 'last_name', 'email', 'phone_num'));
    }

}
