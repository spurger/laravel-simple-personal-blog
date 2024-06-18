<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagFormRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::withCount('articles')->orderBy('name')->paginate(10);

        return view('tags', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagFormRequest $request)
    {
        $validated = $request->validated();

        Tag::create($validated);

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $tag->loadCount('articles');
        $articles = Article::whereHas('tags', function (Builder $query) use ($tag) {
            $query->where('tag_id', $tag->id);
        })->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('tags.show', compact('tag', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagFormRequest $request, Tag $tag)
    {
        $validated = $request->validated();

        $tag->fill($validated)->save();

        return redirect()->route('tags.show', ['tag' => $tag]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
