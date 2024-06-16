<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', only: ['create', 'store', 'destroy']),
        ];
    }

    public function index()
    {
        $articles = Article::get();

        return view('articles', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string|max:65535',
        ]);

        $article = Article::create($validated);

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
