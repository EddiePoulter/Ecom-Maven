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
        $equipmentTag = Tag::firstOrCreate(['name' => 'Equipment']);
        $accessoriesTag = Tag::firstOrCreate(['name' => 'Accessories']);


        $tags = Tag::all();


        $filterTags = collect(['All-Mountain', 'Freeride', 'Park & Pipe', 'Big Mountain', 'Avalanche Safety'])->map(function ($tagName) {
            return Tag::firstOrCreate(['name' => $tagName]);
        });

       // Create a counter for each filter tag and convert it to an array
        $filterTagCounters = $filterTags->mapWithKeys(function ($tag) {
        return [$tag->id => 0];
        })->toArray();

        // Define the products
        $productsData = [
            [
                'name' => 'Ski(178cm) Equipment Set',
                'price' => 299,
                'description' => 'An all-in-one skiing Unisex package, featuring skis measuring 178 centimeters for versatile use.',
                'image_path' => 'images/product-images/skiingequipmentset.png',
                'stock' => 10,
                'tag' => $skiTag
            ],
            [
                'name' => 'Freestyle Ski (170cm)',
                'price' => 129,
                'description' => 'Unleash your creativity on the slopes with these versatile freestyle skis',
                'image_path' => 'images/product-images/ski1.jpg',
                'stock' => 10,
                'tag' => $skiTag,
            ],
            [
                'name' => 'Majesty Ski (190cm)',
                'price' => 349,
                'description' => 'Float effortlessly through deep powder with these dedicated powder skis.',
                'image_path' => 'images/product-images/ski2.jpg',
                'stock' => 5,
                'tag' => $skiTag,
            ],
            [
                'name' => 'Carving Skis (160cm)',
                'price' => 199,
                'description' => 'Carve precision turns on groomed trails with these specialized carving skis.',
                'image_path' => 'images/product-images/ski3.jpg',
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
            'name' => 'Unisex Red Ski Jacket',
            'price' => 49,
            'description' => 'Stay stylish and warm with this functional red ski jacket, perfect for your winter adventures.',
            'image_path' => 'images/product-images/redjacket.jpg',
            'stock' => 10,
            'tag' => $clothesTag,
            ],
            [
                'name' => 'Unisex Ski Thermal Leggings',
                'price' => 39,
                'description' => 'High-performance thermal leggings designed for skiing, ensuring warmth and flexibility.',
                'image_path' => 'images/product-images/thermalleggings.jpg',
                'stock' => 10,
                'tag' => $clothesTag,
            ],
            [
                'name' => 'Unisex Ski Trousers',
                'price' => 49,
                'description' => 'Durable trousers suitable for all genders, designed to keep you warm and dry in harsh winter conditions.',
                'image_path' => 'images/product-images/skitrousers.jpg',
                'stock' => 10,
                'tag' => $clothesTag,
            ],
            [
                'name' => 'All-Mountain Snowboard (170cm)',
                'price' => 249,
                'description' => 'Conquer any terrain with this versatile all-mountain snowboard.',
                'image_path' => 'images/product-images/snowboard3.jpg',
                'stock' => 15,
                'tag' => $snowboardsTag,
            ],
            [
                'name' => 'Jones Freeride Snowboard (165cm)',
                'price' => 279,
                'description' => 'Experience the thrill of off-piste riding with this freeride snowboard.',
                'image_path' => 'images/product-images/snowboard4.jpg',
                'stock' => 10,
                'tag' => $snowboardsTag,
            ],
            [
                'name' => 'Capita White Snowboard (160cm)',
                'price' => 449,
                'description' => 'Hit the park or pipe with confidence on this specially designed snowboard by Capita',
                'image_path' => 'images/product-images/snowboard2.jpg',
                'stock' => 10,
                'tag' => $snowboardsTag,
            ],
            [
                'name' => 'Big Mountain Snowboard (170cm)',
                'price' => 329,
                'description' => 'Conquer the backcountry and big terrain features with this robust big mountain snowboard.',
                'image_path' => 'images/product-images/snowboard1.jpg',
                'stock' => 10,
                'tag' => $snowboardsTag,
            ],
            [
                'name' => 'Unisex Ski Thermal Shirt',
                'price' => 45,
                'description' => 'Versatile thermal shirt designed for skiing, providing excellent moisture-wicking and insulation properties.',
                'image_path' => 'images/product-images/thermalshirt.jpg',
                'stock' => 10,
                'tag' => $clothesTag,
            ],
            [
                'name' => 'Ski Binders',
                'price' => 79,
                'description' => 'High-quality ski binders, providing precise control and stability on the slopes.',
                'image_path' => 'images/product-images/skibinders.jpg',
                'stock' => 10,
                'tag' => $equipmentTag,
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
                'tag' => $accessoriesTag,
            ],
            [
                'name' => 'Unisex Ski Helmet',
                'price' => 79,
                'description' => 'A protective and comfortable helmet for skiing, suitable for all genders.',
                'image_path' => 'images/product-images/skihelmet.jpg',
                'stock' => 10,
                'tag' => $accessoriesTag,
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
                'tag' => $skiTag
            ],
            [
                'name' => 'Ski Backpack',
                'price' => 79,
                'description' => 'Versatile ski backpack equipped with specialized compartments for carrying essentials.',
                'image_path' => 'images/product-images/backpack.jpg',
                'stock' => 10,
                'tag' => $accessoriesTag,
            ],
            [
                'name' => 'Ski Socks Pair',
                'price' => 9,
                'description' => 'Premium quality ski socks designed to provide warmth, comfort, and moisture-wicking properties.',
                'image_path' => 'images/product-images/socks.jpg',
                'stock' => 20,
                'tag' => $accessoriesTag,
            ],
            [
                'name' => 'Ski Wax and Tuning Kit',
                'price' => 39,
                'description' => 'Complete ski wax and tuning kit including wax, scraper, brush, and edge tuner.',
                'image_path' => 'images/product-images/waxkit.jpg',
                'stock' => 15,
                'tag' => $equipmentTag,
            ],
            [
                'name' => 'Dalbello Ski Boots',
                'price' => 249,
                'description' => 'Top-of-the-line ski boots designed for maximum performance and comfort on the slopes.',
                'image_path' => 'images/product-images/skiboots.jpg',
                'stock' => 10,
                'tag' => $equipmentTag,
            ],
            [
                'name' => 'Ski Boot Bag',
                'price' => 49,
                'description' => 'Durable ski boot bag with ample storage space for ski boots, helmet, goggles, and other accessories.',
                'image_path' => 'images/product-images/skibootbag.jpg',
                'stock' => 15,
                'tag' => $accessoriesTag,
            ],
            [
                'name' => 'Unisex One-Hole Ski Mask',
                'price' => 29,
                'description' => 'A breathable unisex ski mask designed to provide warmth and protection during cold weather activities.',
                'image_path' => 'images/product-images/skimask.jpg',
                'stock' => 20,
                'tag' => $clothesTag,
            ],
            [
                'name' => 'Unisex Three-Hole Ski Mask',
                'price' => 34,
                'description' => 'A versatile three-hole ski mask offering full face protection in extreme weather conditions.',
                'image_path' => 'images/product-images/skimask2.jpg',
                'stock' => 10,
                'tag' => $clothesTag,
            ],

            [
                'name' => 'Ski Storage Rack',
                'price' => 99,
                'description' => 'A durable and versatile universal ski rack designed to securely transport skis and snowboards at your home.',
                'image_path' => 'images/product-images/skirack.jpg',
                'stock' => 10,
                'tag' => $equipmentTag,
            ],
            [
                'name' => 'Ski Poles',
                'price' => 69,
                'description' => 'Durable and adjustable ski poles suitable for all genders.',
                'image_path' => 'images/product-images/skipoles.jpg',
                'stock' => 10,
                'tag' => $equipmentTag,
            ],
            [
                'name' => 'Unisex Ski Gloves',
                'price' => 14,
                'description' => 'Comfortable and warm ski gloves designed for both men and women.',
                'image_path' => 'images/product-images/skigloves.jpg',
                'stock' => 10,
                'tag' => $accessoriesTag,
            ],
        ];

        $tags = Tag::all(); // Fetch all tags

        foreach ($productsData as $productData) {
            $tagName = $productData['tag']->name; // Get the tag name
            unset($productData['tag']); // Remove the tag from the product data

            // Define the conditions to find the product
            $conditions = ['name' => $productData['name']];

            // Create or update the product
            $product = Product::updateOrCreate($conditions, $productData);

            // Find the tag by its name
            $tag = Tag::where('name', $tagName)->first();

            // Associate the product with the tag
            if ($tag) {
                $product->tags()->syncWithoutDetaching([$tag->id]);
            } else {
                // Handle the case where the tag is not found
                // You might want to log an error or perform some other action
            }

            // Attach a random filter tag to the product
            $randomTag = $filterTags->random();
            if ($filterTagCounters[$randomTag->id] < 6) { // Change 6 to the maximum number of products per tag
                $product->tags()->syncWithoutDetaching([$randomTag->id]);
                $filterTagCounters[$randomTag->id]++;
            }
        }
    }
}
