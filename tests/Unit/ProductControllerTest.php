<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $product = Product::factory()->create();
        $tag = Tag::factory()->create();
        $product->tags()->attach($tag);

        $response = $this->get(route('products'));

        $response->assertStatus(200);
        $response->assertViewHas('products', Product::paginate());
        $response->assertViewHas('tags', Tag::all());
    }

    public function testProductCart()
    {
        $product = Product::factory()->create();
        $cart = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 2,
                'price' => $product->price,
                'description' => $product->description,
                'image_path' => $product->image_path,
            ],
        ];
        session(['cart' => $cart]);

        $response = $this->get(route('shopping.cart'));

        $response->assertStatus(200);
        $response->assertViewHas('products', collect([$product]));
        $response->assertViewHas('cart', $cart);
    }

    public function testShowProduct()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.show', $product->id));

        $response->assertStatus(200);
        $response->assertViewHas('product', $product);
        $response->assertViewHas('stock', $product->stock);
    }

    public function testGetRandomProducts()
    {
        $products = Product::factory()->count(5)->create();

        $randomProducts = $this->app->make('App\Http\Controllers\ProductController')->getRandomProducts(3);

        $this->assertCount(3, $randomProducts);
        $this->assertTrue($randomProducts->every(function ($product) use ($products) {
            return $products->contains($product);
        }));
    }

    public function testAddProductToCart()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('addProduct.to.cart', $product->id));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Product has been added to cart!');
        $this->assertEquals(1, count(session('cart')));
    }

    public function testRemoveProductFromCart()
    {
        $product = Product::factory()->create();
        $cart = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 2, // Initial quantity is set to 2
                'price' => $product->price,
                'description' => $product->description,
                'image_path' => $product->image_path,
            ],
        ];
        session(['cart' => $cart]);
    
        $response = $this->post(route('removeProduct.from.cart', $product->id));
    
        $response->assertRedirect();
        $response->assertSessionHas('success', 'Product has been removed from cart!');
        
        // Retrieve the updated cart from the session
        $updatedCart = session('cart');
        // should expect the quantity to be decremented to 1 after removal
        $this->assertEquals(1, $updatedCart[$product->id]['quantity']); 
    }
    
    public function testUpdateCart()
    {
        $product = Product::factory()->create();
        $cart = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'description' => $product->description,
                'image_path' => $product->image_path,
            ],
        ];
        session(['cart' => $cart]);

        $response = $this->patch(route('update.sopping.cart'), [
            'id' => $product->id,
            'quantity' => 3,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertEquals(3, session('cart')[$product->id]['quantity']);
    }

    public function testDeleteProduct()
    {
        $product = Product::factory()->create();
        $cart = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'description' => $product->description,
                'image_path' => $product->image_path,
            ],
        ];
        session(['cart' => $cart]);

        $response = $this->delete(route('delete.cart.product'), [
            'id' => $product->id,
        ]);

        $response->assertSessionHas('success', 'Product successfully deleted.');
        $this->assertEmpty(session('cart'));
    }

    public function testCheckout()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $product = Product::factory()->create();
        $cart = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'description' => $product->description,
                'image_path' => $product->image_path,
            ],
        ];
        session(['cart' => $cart]);

        $response = $this->get(route('checkout.product'));

        $response->assertStatus(200);
        $response->assertViewHas('products', collect([$product]));
        $response->assertViewHas('cart', $cart);
        $response->assertViewHas('first_name', $user->name);
        $response->assertViewHas('last_name', '');
        $response->assertViewHas('email', $user->email);
        $response->assertViewHas('phone_num', $user->phone_number);
        // Add assertions for other view data as needed
    }

    public function testSearch()
    {
        $product1 = Product::factory()->create(['name' => 'Test Product 1', 'description' => 'This is a test product']);
        $product2 = Product::factory()->create(['name' => 'Another Test Product', 'description' => 'This is another test product']);

        $response = $this->get(route('search', ['search_query' => 'test']));

        $response->assertStatus(200);
        $response->assertViewHas('products', collect([$product1, $product2]));
        $response->assertViewHas('searchQuery', 'test');
    }

    public function testShowProducts()
    {
        $product1 = Product::factory()->create(['price' => 10, 'category' => 'Category 1']);
        $product2 = Product::factory()->create(['price' => 20, 'category' => 'Category 2']);
        $tag1 = Tag::factory()->create(['name' => 'Tag 1']);
        $tag2 = Tag::factory()->create(['name' => 'Tag 2']);
        $product1->tags()->attach($tag1);
        $product2->tags()->attach($tag2);

        $response = $this->get(route('products.filter', [
            'min_price' => 15,
            'max_price' => 25,
            'category' => 'Category 2',
            'tags' => [$tag2->id],
        ]));

        $response->assertStatus(200);
        $response->assertViewHas('products', collect([$product2]));
        $response->assertViewHas('tags', Tag::all());
    }
}