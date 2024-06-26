@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Categories</h1>
            @auth
                <div class="mb-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Create category</a>
                </div>
            @endauth
            <div class="list-group">
                @forelse ($categories as $category)
                    <a href="{{ route('categories.show', ['category' => $category]) }}"
                        class="list-group-item list-group-item-action">
                        <span class="fw-bold text-primary">{{ $category->name }}</span>
                        <span>({{ $category->articles_count }} articles)</span>
                    </a>
                @empty
                    <div class="alert alert-warning">No categories found.</div>
                @endforelse
            </div>
            <div class="mt-1">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
