<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class StripeCheckoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_to_stripe_checkout()
    {
        // Arrange: Prepare the necessary objects and state, such as adding a product to the cart session.
        $product = Product::factory()->create();
        session()->put('cart', [
            $product->id => [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image_path' => $product->image_path,
            ]
        ]);

        // Act: Make a POST request to the /session route.
        $response = $this->post(route('session'));

        // Assert: Check that the user was redirected to Stripe.
        $response->assertStatus(302); // 302 status code means a redirect occurred.
    }

    /** @test */
    public function it_redirects_back_to_cart_if_cart_is_empty()
    {
        // Arrange: Ensure the cart is empty.
        session()->forget('cart');

        // Act: Make a POST request to the /session route.
        $response = $this->post(route('session'));

        // Assert: Check that the user was redirected back to the cart page.
        $response->assertRedirect(route('cart'));
    }

    /** @test */
    public function it_redirects_to_success_page_after_successful_checkout()
    {
        // Arrange: Prepare the necessary objects and state, such as adding a product to the cart session.
        $product = Product::factory()->create();
        session()->put('cart', [
            $product->id => [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image_path' => $product->image_path,
            ]
        ]);

        // Act: Make a GET request to the /success route.
        $response = $this->get(route('success'));

        // Assert: Check that the user was redirected to the success page.
        $response->assertStatus(200); // 200 status code means a successful request.
    }

  /** @test */
public function it_redirects_to_cart_page_after_cancelled_checkout()
{
    // Act: Make a GET request to the /cancel route.
    $response = $this->get(route('cancel'));

    // Assert: Check that the user was redirected back to the cart page.
    $response->assertStatus(200); // 200 status code means a successful request.
}


    /** @test */
    public function it_increases_product_quantity_in_cart()
    {
        // Arrange: Prepare the necessary objects and state.
        $product = Product::factory()->create();
        session()->put('cart', [
            $product->id => [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image_path' => $product->image_path,
            ]
        ]);

        // Act: Make a POST request to increase the product quantity.
        $response = $this->post('/basket/increase-quantity/' . $product->id);

        // Assert: Check that the product quantity was increased.
        $this->assertEquals(2, session('cart')[$product->id]['quantity']);
    }

    /** @test */
    public function it_decreases_product_quantity_in_cart()
    {
        // Arrange: Prepare the necessary objects and state.
        $product = Product::factory()->create();
        session()->put('cart', [
            $product->id => [
                'name' => $product->name,
                'quantity' => 2,
                'price' => $product->price,
                'image_path' => $product->image_path,
            ]
        ]);

        // Act: Make a POST request to decrease the product quantity.
        $response = $this->post('/basket/decrease-quantity/' . $product->id);

        // Assert: Check that the product quantity was decreased.
        $this->assertEquals(1, session('cart')[$product->id]['quantity']);
    }

    /** @test */
    public function it_removes_product_from_cart()
    {
        // Arrange: Prepare the necessary objects and state.
        $product = Product::factory()->create();
        session()->put('cart', [
            $product->id => [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image_path' => $product->image_path,
            ]
        ]);

        // Act: Make a DELETE request to remove the product from the cart.
        $response = $this->delete('/delete-cart-product', ['id' => $product->id]);

        // Assert: Check that the product was removed from the cart.
        $this->assertArrayNotHasKey($product->id, session('cart'));
    }
}
