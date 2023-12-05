<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Ski(178cm) Equipment Set',
            'price' => 299,
            'description' => 'An all-in-one skiing Unisex package, featuring skis measuring 178 centimeters for versatile use.',
            'image_path' => 'images/product-images/skiingequipmentset.png', 
        ]);

        Product::create([
            'name' => 'Unisex Blue Ski Jacket',
            'price' => 49,
            'description' => 'A stylish and functional blue ski jacket for your winter adventures.',
            'image_path' => 'images/product-images/skiingcoat.png', 
        ]);

        Product::create([
            'name' => 'Ski(178cm)',
            'price' => 94,
            'description' => 'Versatile 178cm skis suitable for both men and women.',
            'image_path' => 'images/product-images/pairofski.jpg', 
        ]);

        Product::create([
            'name' => 'Unisex Ski Goggles',
            'price' => 59,
            'description' => 'High-quality ski goggles designed for both men and women.',
            'image_path' => 'images/product-images/skigoggles2.jpg', 
        ]);

        Product::create([
            'name' => 'Unisex Ski Helmet',
            'price' => 79,
            'description' => 'A protective and comfortable helmet for skiing, suitable for all genders.',
            'image_path' => 'images/product-images/skihelmet.jpg', 
        ]);

        Product::create([
            'name' => 'Snowboard(155cm)',
            'price' => 309,
            'description' => 'A versatile 155cm snowboard suitable for all skill levels.',
            'image_path' => 'images/product-images/snowboard.jpg', 
        ]);

        Product::create([
            'name' => 'Ski(178cm) and Pole Set',
            'price' => 169,
            'description' => 'A comprehensive set including 178cm skis and poles, designed for both men and women.',
            'image_path' => 'images/product-images/pairofskiandpoleset.jpg', 
        ]);

        Product::create([
            'name' => 'Ski Poles',
            'price' => 69,
            'description' => 'Durable and adjustable ski poles suitable for all genders.',
            'image_path' => 'images/product-images/skipoles.jpg', 
        ]);

        Product::create([
            'name' => 'Unisex Ski Gloves',
            'price' => 14,
            'description' => 'Comfortable and warm ski gloves designed for both men and women.',
            'image_path' => 'images/product-images/skigloves.jpg', 
        ]);
    }
}
