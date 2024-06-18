# Laravel Roadmap: Beginner Level Challenge

This is a task for the [Beginner Level of the Laravel Roadmap](https://github.com/LaravelDaily/Laravel-Roadmap-Learning-Path#beginner-level), with the goal to implement as many of its topics as possible.

## The Task: Simple Personal Blog

You need to create a personal blog with just three pages:

- Homepage: List of articles
- Article page
- Some static text page like "About me"

Also, there should be a Login mechanism (but no Register) for the author to write articles:

- Manage (meaning, create/update/delete) categories
- Manage tags
- Manage articles
- For Auth Starter Kit, use [Laravel Breeze](https://github.com/laravel/breeze) (Tailwind) or [Laravel UI](https://github.com/laravel/ui) (Bootstrap) - that starter kit will have some design, which is enough: the design is irrelevant for accomplishing the task

**DB Structure:**

- Article has title (required), full text (required) and image to upload (optional)
- Article may have only one category, but may have multiple tags

-----

### How to use

- Clone or download git repository
- Copy .env.example file to .env and edit database credentials there
- Run `php artisan key:generate`
- Run `composer install`
- Run `npm install`, then run `npm run dev`
- Run `php artisan migrate --seed`, which will create a default user for login (email: example@example.com, password: password).
- For more test data that includes articles, categories and tags, run `php artisan db:seed --class=ArticleSeeder`
- Run `php artisan serve` to the results
