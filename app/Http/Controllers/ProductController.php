<?php

namespace App\Http\Controllers;
use App\Models\User;
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
        $stock = $product->stock;
        return view('product', compact('product', 'stock'));
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

        // Initialised user variables with default values in case user is not authenticated
        $first_name = $last_name = $email = $phone_num = $address_1 = $address_2 = $city = $county = $postcode = '';

        // Checks if user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $name = $user->name ?? '';
            [$first_name, $last_name] = User::split_name($name);
            $email = $user->email ?? '';
            $phone_num = $user->phone_number ?? '';
            $address_1 = $user->address_line_1 ?? '';
            $address_2 = $user->address_line_2 ?? '';
            $city = $user->city ?? '';
            $county = $user->county ?? '';
            $postcode = $user->postcode ?? '';
        }

        return view('checkout', compact(
            'products',
            'cart',
            'first_name',
            'last_name',
            'email',
            'phone_num',
            'address_1',
            'address_2',
            'city',
            'county',
            'postcode',
        ));
    }
    // Define the search method to handle the search functionality.
    public function search(Request $request){
        $searchQuery = $request->input('search_query');
        
        // Perform search query using the $searchQuery variable
        
        $products = Product::where('name', 'like', '%' . $searchQuery . '%')
            ->orWhere('description', 'like', '%' . $searchQuery . '%')
            ->get();

        return view('search_results', compact('products', 'searchQuery'));
        // Create a new blade file to display search results.
    }
}
