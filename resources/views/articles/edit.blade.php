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
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-control">
                        <option disabled value="">Select a category...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $article->category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <select id="tags" name="tags[]" multiple class="form-control">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @if ($tag->selected) selected @endif>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
