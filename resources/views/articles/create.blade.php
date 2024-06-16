@extends('layouts.app')

@section('title', 'Create article')

@section('content')
    <h1>Create article</h1>
    <form method="POST" action="{{ route('articles.store') }}">
        @csrf

        <div>
            <label for="title">Title</label>
            <input id="title" type="text" name="title" autocomplete="off">
        </div>
        <div>
            <label for="full_text">Text content</label><br>
            <textarea id="full_text" name="full_text" rows="20" placeholder="Write you content here..."></textarea>
        </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
@endsection
