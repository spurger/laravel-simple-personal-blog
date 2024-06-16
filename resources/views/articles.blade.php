@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <h1 class="mb-3">Articles</h1>
    @forelse ($articles as $article)
        <article class="mb-3">
            <h2 class="fs-5">
                <a href="{{ route('articles.show', ['article' => $article]) }}" class="mb-3">
                    {{ $article->title }}
                </a>
            </h2>
            <div class="text-truncate fs-6">{{ $article->full_text }}</div>
        </article>
    @empty
        <div class="alert alert-warning">No articles found.</div>
    @endforelse
@endsection
