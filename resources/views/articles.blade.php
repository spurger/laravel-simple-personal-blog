@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <h1>Articles</h1>
    @foreach ($articles as $article)
        <article>
            <a href="{{ route('articles.show', ['article' => $article]) }}">
                <h2>{{ $article->title }}</h2>
            </a>
            <pre>{{ $article->full_text }}</pre>
        </article>
    @endforeach
@endsection
