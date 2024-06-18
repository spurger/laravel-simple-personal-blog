@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Edit category</h1>
            <h2>{{ $category->name }}</h2>
            <form method="POST" action="{{ route('categories.update', ['category' => $category]) }}">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" name="name" class="form-control"
                        value="{{ old('name') ?? $category->name }}" autocomplete="off">
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>

        </div>
    </div>
@endsection
