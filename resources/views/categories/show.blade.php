@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Category: {{ $category->name }}</h1>
            <div>Article count: <span class="fw-bold">{{ $category->articles_count }}</span></div>
            @auth
                <div class="d-flex mt-2 gap-2">
                    <a class="btn btn-warning" href="{{ route('categories.edit', ['category' => $category]) }}">Edit</a>
                    <form method="POST" action="{{ route('categories.destroy', ['category' => $category]) }}">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger" @if ($category->articles_count > 0) disabled @endif>
                            Delete
                        </button>
                    </form>
                </div>
                <div class="mt-1">
                    <small class="text-danger">You cannot delete a category that has articles.</small>
                </div>
            @endauth
            <h2 class="mt-3">Articles under this category</h2>
            @forelse ($articles as $article)
                <x-article class="mb-3" :article="$article" :headingLevel="3" />
            @empty
                <div>No articles found.</div>
            @endforelse
            {{ $articles->links() }}
        </div>
    </div>
@endsection
