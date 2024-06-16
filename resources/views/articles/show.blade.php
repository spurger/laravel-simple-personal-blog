@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>{{ $article->title }}</h1>
            <pre style="white-space: pre-line">{{ $article->full_text }}</pre>
        </div>
    </div>
@endsection
