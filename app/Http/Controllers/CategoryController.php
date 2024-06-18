<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CategoryController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', only: ['create', 'store', 'edit', 'update', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('articles')
            ->orderBy('name')
            ->paginate(10);

        return view('categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->loadCount('articles');
        $articles = Article::where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('categories.show', compact('category', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->fill($validated)->save();

        return redirect()->route('categories.show', ['category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->loadCount('articles');

        if ($category->articles_count > 0) {
            abort(500);
        }

        $category->delete();

        return redirect()->route('categories.index');
    }
}
