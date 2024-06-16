@extends('layouts.guest')

@section('title', 'Articles')

@section('content')
    <h1>Articles</h1>
    @foreach ($articles as $article)
        <article>
            <h2>{{ $article->title }}</h2>
            <pre>{{ $article->full_text }}</pre>
        </article>
    @endforeach
@endsection
