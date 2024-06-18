@extends('layouts.app')

@section('title', 'Create tag')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Create tag</h1>
            <form method="POST" action="{{ route('tags.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}"
                        autocomplete="off">
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
