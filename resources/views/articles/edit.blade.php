@extends('layouts.app')

@section('title', 'Edit article')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Edit article</h1>
            <h2>{{ $article->title }}</h2>
            <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input id="title" type="text" name="title" value="{{ $article->title }}" class="form-control"
                        autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="full_text" class="form-label">Text content</label>
                    <textarea id="full_text" name="full_text" rows="10" class="form-control" placeholder="Write you content here...">{{ $article->full_text }}</textarea>
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
