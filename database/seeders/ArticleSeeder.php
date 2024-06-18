<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
