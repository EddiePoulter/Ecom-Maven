<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(); // Paginate all available products
        $tags = Tag::whereIn('name', ['All-Mountain', 'Freeride', 'Park & Pipe', 'Big Mountain', 'Avalanche Safety'])->get();
        return view('products', compact('products', 'tags'));
    }


public function showSkiProducts()
{
    // Fetch all products related to the Ski tag
    $skiTag = Tag::where('name', 'Ski')->first();
    $products = $skiTag->products()->paginate(15); // Use the name $products
    $tags = Tag::all()->unique(); // Fetch all unique tags
    
    return view('products', compact('products', 'tags')); // Pass the products and tags to the view
}

public function showClothesProducts()
{
    // Fetch all products related to the Clothes tag
    $clothesTag = Tag::where('name', 'Clothes')->first();
    $products = $clothesTag->products()->paginate(15); // Use the name $products
    $tags = Tag::all()->unique(); // Fetch all unique tags
    
    return view('products', compact('products', 'tags')); // Pass the products and tags to the view
}

public function showSnowboardsProducts()
{
    // Fetch all products related to the Snowboards tag
    $snowboardsTag = Tag::where('name', 'Snowboards')->first();
    $products = $snowboardsTag->products()->paginate(15); // Use the name $products
    $tags = Tag::all()->unique(); // Fetch all unique tags

    return view('products', compact('products', 'tags')); // Pass the products and tags to the view

} 

public function showEquipmentProducts()
{
    // Fetch all products related to the Equipment tag
    $equipmentTag = Tag::where('name', 'Equipment')->first();
    $products = $equipmentTag->products()->paginate(15);
    $tags = Tag::all()->unique();

    return view('products', compact('products', 'tags'));
}

public function showAccessoriesProducts()
{
    // Fetch all products related to the Accessories tag
    $accessoriesTag = Tag::where('name', 'Accessories')->first();
    $products = $accessoriesTag->products()->paginate(15);
    $tags = Tag::all()->unique();

    return view('products', compact('products', 'tags'));
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
        $product = Product::with('reviews')->findOrFail($id);
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
            'postcode'
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
    // Assuming you have a method in your controller for displaying products
   
    
    public function showProducts(Request $request)
{
    $products = Product::query();

    if ($request->has('min_price') && $request->has('max_price')) {
        $products->whereBetween('price', [$request->min_price, $request->max_price]);
    }

    if ($request->has('category')) {
        $products->where('category', $request->category);
    }

    // Check if tags are selected
    $selectedTags = $request->input('tags');
    if ($selectedTags) {
        $products->whereHas('tags', function ($query) use ($selectedTags) {
            $query->whereIn('tag_id', $selectedTags);
        });
    }

    // Fetch filtered products
    $products = $products->paginate(15); // Adjust pagination as per your requirement

    // Fetch all tags to display in the filter form
    $tags = Tag::all();

    // Pass both products and tags to the view
    return view('products', compact('products', 'tags'));
}

    

}

