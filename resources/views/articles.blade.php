@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="mb-3">
                <h1>Articles</h1>
                @auth
                    <div>
                        <a href="{{ route('articles.create') }}" class="btn btn-primary">Create article</a>
                    </div>
                @endauth
            </div>
            @forelse ($articles as $article)
                <x-article class="mb-3" :article="$article" />
            @empty
                <div class="alert alert-warning">No articles found.</div>
            @endforelse
            {{ $articles->links() }}
        </div>
    </div>
@endsection
