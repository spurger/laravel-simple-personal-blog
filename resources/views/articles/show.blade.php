@extends('layouts.guest')

@section('title', $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>
    <pre>{{ $article->full_text }}</pre>
@endsection
