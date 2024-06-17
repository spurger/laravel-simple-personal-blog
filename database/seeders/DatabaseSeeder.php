<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        Schema::enableForeignKeyConstraints();

        User::factory()->create([
            'name' => 'Test Author',
            'email' => 'example@example.com',
        ]);

        $categories = Category::factory()->count(3)->create();

        Article::factory()->count(20)->recycle($categories)->create();
    }
}
