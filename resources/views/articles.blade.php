@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="mb-3">
                <h1>Articles</h1>
            </div>
            @forelse ($articles as $article)
                <article class="mb-3">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div>
                            <h2 class="fs-5 mb-0">
                                <a href="{{ route('articles.show', ['article' => $article]) }}" class="mb-3">
                                    {{ $article->title }}
                                </a>
                            </h2>
                            <small class="text-body-secondary">{{ $article->created_at }}</small>
                        </div>
                        @auth
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item text-warning"
                                            href="{{ route('articles.edit', ['article' => $article]) }}">Edit</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                    <div class="text-truncate fs-6">{{ $article->full_text }}</div>
                </article>
            @empty
                <div class="alert alert-warning">No articles found.</div>
            @endforelse
            {{ $articles->links() }}
        </div>
    </div>
@endsection
