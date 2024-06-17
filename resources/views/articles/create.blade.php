@extends('layouts.app')

@section('title', 'Create article')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Create article</h1>
            <form method="POST" action="{{ route('articles.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input id="title" type="text" name="title" class="form-control" value="{{ old('title') }}"
                        autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="full_text" class="form-label">Text content</label>
                    <textarea id="full_text" name="full_text" rows="10" class="form-control" placeholder="Write you content here...">{{ old('full_text') }}</textarea>
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
