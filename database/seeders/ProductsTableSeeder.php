<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Tag;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the tags
        $skiTag = Tag::firstOrCreate(['name' => 'Ski']);
        $snowboardsTag = Tag::firstOrCreate(['name' => 'Snowboards']);
        $clothesTag = Tag::firstOrCreate(['name' => 'Clothes']);
    
        $tags = Tag::all();


        if ($tags->isEmpty()) {
            $tags = collect(['All-Mountain', 'Freeride', 'Park & Pipe', 'Big Mountain', 'Avalanche Safety'])->map(function ($tagName) {
                return Tag::firstOrCreate(['name' => $tagName]);
            });
        }
    

        // Define the products
        $productsData = [
            [
                'name' => 'Ski(178cm) Equipment Set',
                'price' => 299,
                'description' => 'An all-in-one skiing Unisex package, featuring skis measuring 178 centimeters for versatile use.',
                'image_path' => 'images/product-images/skiingequipmentset.png',
                'stock' => 10,
                'tag' => $skiTag,
            ],
            [
                'name' => 'Unisex Blue Ski Jacket',
                'price' => 49,
                'description' => 'A stylish and functional blue ski jacket for your winter adventures.',
                'image_path' => 'images/product-images/skiingcoat.png',
                'stock' => 10,
                'tag' => $clothesTag,
            ],
            [
                'name' => 'Ski(178cm)',
                'price' => 94,
                'description' => 'Versatile 178cm skis suitable for both men and women.',
                'image_path' => 'images/product-images/pairofski.jpg',
                'stock' => 10,
                'tag' => $skiTag,
            ],
            [
                'name' => 'Unisex Ski Goggles',
                'price' => 59,
                'description' => 'High-quality ski goggles designed for both men and women.',
                'image_path' => 'images/product-images/skigoggles2.jpg',
                'stock' => 10,
                'tag' => $clothesTag,
            ],
            [
                'name' => 'Unisex Ski Helmet',
                'price' => 79,
                'description' => 'A protective and comfortable helmet for skiing, suitable for all genders.',
                'image_path' => 'images/product-images/skihelmet.jpg',
                'stock' => 10,
                'tag' => $clothesTag,
            ],
            [
                'name' => 'Snowboard(155cm)',
                'price' => 309,
                'description' => 'A versatile 155cm snowboard suitable for all skill levels.',
                'image_path' => 'images/product-images/snowboard.jpg',
                'stock' => 10,
                'tag' => $snowboardsTag,
            ],
            [
                'name' => 'Ski(178cm) and Pole Set',
                'price' => 169,
                'description' => 'A comprehensive set including 178cm skis and poles, designed for both men and women.',
                'image_path' => 'images/product-images/pairofskiandpoleset.jpg',
                'stock' => 10,
                'tag' => $skiTag,
            ],
            [
                'name' => 'Ski Poles',
                'price' => 69,
                'description' => 'Durable and adjustable ski poles suitable for all genders.',
                'image_path' => 'images/product-images/skipoles.jpg',
                'stock' => 10,
                'tag' => $skiTag,
            ],
            [
                'name' => 'Unisex Ski Gloves',
                'price' => 14,
                'description' => 'Comfortable and warm ski gloves designed for both men and women.',
                'image_path' => 'images/product-images/skigloves.jpg',
                'stock' => 10,
                'tag' => $clothesTag,
            ],
        ];

        $tags = Tag::all(); // Fetch all tags


        foreach ($productsData as $productData) {
            $tagName = $productData['tag']->name; // Get the tag name
            unset($productData['tag']); // Remove the tag from the product data
        
            // Create or update the product
            $product = Product::updateOrCreate($productData);
        
            // Find the tag by its name
            $tag = Tag::where('name', $tagName)->first();
        
            // Associate the product with the tag
            if ($tag) {
                $product->tags()->sync([$tag->id]);
            } else {
                // Handle the case where the tag is not found
                // You might want to log an error or perform some other action
            }
        }
        
}
}
