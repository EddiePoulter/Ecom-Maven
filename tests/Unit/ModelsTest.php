<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_product_has_many_reviews_and_belongs_to_many_tags()
    {
        $product = Product::factory()->create();
        $review = Review::factory()->create(['product_id' => $product->id]);
        $tag = Tag::factory()->create();
        $product->tags()->attach($tag);

        $this->assertTrue($product->reviews->contains($review));
        $this->assertTrue($product->tags->contains($tag));
    }

    /** @test */
    public function a_review_belongs_to_a_product_and_a_user()
    {
        $product = Product::factory()->create();
        $user = User::factory()->create();
        $review = Review::factory()->create(['product_id' => $product->id, 'user_id' => $user->id]);

        $this->assertTrue($review->product->is($product));
        $this->assertTrue($review->user->is($user));
    }

    /** @test */
    public function a_tag_belongs_to_many_products()
    {
        $tag = Tag::factory()->create();
        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();
        $tag->products()->attach([$product1->id, $product2->id]);

        $this->assertTrue($tag->products->contains($product1));
        $this->assertTrue($tag->products->contains($product2));
    }

    /** @test */
    public function a_user_can_split_name_into_first_and_last_name()
    {
        $user = User::factory()->create(['name' => 'John Doe']);
        [$first_name, $last_name] = $user->split_name($user->name);

        $this->assertEquals('John', $first_name);
        $this->assertEquals('Doe', $last_name);
    }
}
