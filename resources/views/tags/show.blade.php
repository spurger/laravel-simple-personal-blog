@extends('layouts.app')

@section('title', 'Tags')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Tag: {{ $tag->name }}</h1>
            <div>Article count: <span class="fw-bold">{{ $tag->articles_count }}</span></div>
            @auth
                <div class="d-flex mt-2 gap-2">
                    <a class="btn btn-warning" href="{{ route('tags.edit', ['tag' => $tag]) }}">Edit</a>
                    <form method="POST" action="{{ route('tags.destroy', ['tag' => $tag]) }}">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            @endauth
            <h2 class="mt-3">Articles under this tag</h2>
            @forelse ($articles as $article)
                <x-article class="mb-3" :article="$article" />
            @empty
                <div>No articles found.</div>
            @endforelse
            {{ $articles->links() }}
        </div>
    </div>
@endsection
