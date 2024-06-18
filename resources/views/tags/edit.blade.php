@extends('layouts.app')

@section('title', 'Edit tag')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Edit tag</h1>
            <h2>{{ $tag->name }}</h2>
            <form method="POST" action="{{ route('tags.update', ['tag' => $tag]) }}">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" name="name" class="form-control"
                        value="{{ old('name', $tag->name) }}" autocomplete="off">
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
