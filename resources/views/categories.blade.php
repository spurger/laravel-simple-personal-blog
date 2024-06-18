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
                        <span>{{ $category->name }}</span>
                        <span>({{ $category->articles_count }} articles)</span>
                    </a>
                @empty
                    <div>No categories found.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
