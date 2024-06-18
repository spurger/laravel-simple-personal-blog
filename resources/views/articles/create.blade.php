@extends('layouts.app')

@section('title', 'Create article')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Create article</h1>
            <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
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
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-control">
                        <option selected disabled value="">Select a category...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category') == $category->id)>
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
                                    id="tag_{{ $tag->id }}" @checked(in_array($tag->id, old('tags', [])))>
                                <label class="form-check-label text-success" for="tag_{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input id="photo" type="file" name="photo" class="form-control" accept="image/*">
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
