<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', only: ['create', 'store', 'edit', 'update', 'destroy']),
        ];
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

        return view('articles', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('articles.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string|max:65535',
            'category' => 'required|exists:categories,id',
            'tags' => 'sometimes|array',
            'tags.*' => 'required|exists:tags,id',
        ]);

        $article = Article::make($validated);
        $article->category()->associate($validated['category']);
        $article->save();
        if (isset($validated['tags'])) {
            $article->tags()->attach($validated['tags']);
        }

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        /** @var \Illuminate\Support\Collection */
        $tagIds = $article->tags->pluck('id');
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        foreach ($tags as $tag) {
            $tag->selected = $tagIds->contains($tag->id);
        }

        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string|max:65535',
            'category' => 'required|exists:categories,id',
            'tags' => 'sometimes|array',
            'tags.*' => 'required|exists:tags,id',
        ]);

        $article->fill($validated)->save();
        $article->category()->associate($validated['category']);
        $article->save();
        $tags = $validated['tags'] ?? [];
        $article->tags()->sync($tags);

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
