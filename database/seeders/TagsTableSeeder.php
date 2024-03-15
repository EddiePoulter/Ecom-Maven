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
        $tags = ['tag1', 'tag2', 'tag3', 'tag4', 'tag5'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
