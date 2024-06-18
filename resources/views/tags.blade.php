@extends('layouts.app')

@section('title', 'Tags')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Tags</h1>
            @auth
                <div>
                    <a href="{{ route('tags.create') }}" class="btn btn-success">Create tag</a>
                </div>
            @endauth
            <div class="list-group mt-3">
                @forelse ($tags as $tag)
                    <a href="{{ route('tags.show', ['tag' => $tag]) }}" class="list-group-item list-group-item-action">
                        <span class="fw-bold text-success">{{ $tag->name }}</span>
                        <span>({{ $tag->articles_count }} articles)</span>
                    </a>
                @empty
                    <div class="alert alert-warning">No tags found.</div>
                @endforelse
            </div>
            <div class="mt-1">
                {{ $tags->links() }}
            </div>
        </div>
    </div>
@endsection
