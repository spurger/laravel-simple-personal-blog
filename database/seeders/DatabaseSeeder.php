<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Category::truncate();
        Article::truncate();
        Tag::truncate();
        DB::table('article_tag')->truncate();
        Schema::enableForeignKeyConstraints();

        User::factory()->create([
            'name' => 'Test Author',
            'email' => 'example@example.com',
        ]);

        $categories = Category::factory()->count(3)->create();

        $tags = Tag::factory()->count(10)->create();

        $articles = Article::factory()->count(20)->recycle($categories)->create();

        foreach ($articles as $article) {
            $count = fake()->numberBetween(0, 5);
            $connectedTags = fake()->randomElements($tags, $count);
            $tagIds = array_map(fn ($tag) => $tag->id, $connectedTags);
            $article->tags()->attach($tagIds);
        }
    }
}
