@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>{{ $article->title }}</h1>
            <div>
                <span class="badge rounded-pill text-bg-primary">
                    {{ $article->category->name }}
                </span>
                @foreach ($article->tags as $tag)
                    <span class="badge rounded-pill text-bg-success fw-medium">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
            <small class="text-body-secondary">{{ $article->created_at }}</small>
            @auth
                <div class="d-flex mb-3 mt-2 gap-2">
                    <a class="btn btn-warning" href="{{ route('articles.edit', ['article' => $article]) }}">Edit</a>
                    <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endauth
            <div class="mt-3" style="white-space: pre-line">{{ $article->full_text }}</div>
        </div>
    </div>
@endsection
