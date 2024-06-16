@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>
    <pre style="white-space: pre-line">{{ $article->full_text }}</pre>
@endsection
