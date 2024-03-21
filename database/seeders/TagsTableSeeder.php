<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['All-Mountain', 'Freeride', 'Park & Pipe', 'Big Mountain', 'Avalanche Safety'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
