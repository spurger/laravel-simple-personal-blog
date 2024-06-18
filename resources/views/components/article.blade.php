@props(['article'])

<article {{ $attributes }}>
    <div class="d-flex justify-content-between gap-3">
        <div>
            <div>
                <h2 class="fs-5 mb-0">
                    <a href="{{ route('articles.show', ['article' => $article]) }}">
                        {{ $article->title }}
                    </a>
                </h2>
            </div>
            <div>
                <span class="badge rounded-pill text-bg-primary">
                    {{ $article->category->name }}
                </span>
                @foreach ($article->tags as $tag)
                    <span class="badge rounded-pill text-bg-success fw-medium">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
            <small class="text-body-secondary">{{ $article->created_at }}</small>
        </div>
    </div>
    <div class="text-truncate fs-6">{{ $article->full_text }}</div>
</article>
