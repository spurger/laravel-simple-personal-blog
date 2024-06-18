@extends('layouts.app')

@section('title', 'Edit article')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Edit article</h1>
            <h2>{{ $article->title }}</h2>
            <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $article->title) }}"
                        class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="full_text" class="form-label">Text content</label>
                    <textarea id="full_text" name="full_text" rows="10" class="form-control" placeholder="Write you content here...">{{ old('full_text', $article->full_text) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-control">
                        <option disabled value="">Select a category...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id == old('category', $article->category->id))>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <div style="max-height: 15rem; overflow-y: auto">
                        @foreach ($tags as $tag)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    id="tag_{{ $tag->id }}" @checked(in_array($tag->id, old('tags', $article->tags->pluck('id')->all())))>
                                <label class="form-check-label text-success" for="tag_{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if (!empty($article->photo_path))
                    <div class="mb-2">
                        <label class="form-label">Current photo:</label>
                        <img class="d-block img-thumbnail" style="width: 15rem;"
                            src="{{ asset('storage/' . $article->photo_path) }}">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" name="remove_photo" id="remove_photo"
                            @checked(old('remove_photo'))>
                        <label class="form-check-label" for="remove_photo">
                            Remove current image
                        </label>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="photo" class="form-label">New photo</label>
                    <input id="photo" type="file" name="photo" class="form-control" accept="image/*"
                        aria-describedby="photo_description">
                    <div id="photo_description" class="form-text">
                        Uploading a new photo will automatically remove the current one.
                    </div>
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
