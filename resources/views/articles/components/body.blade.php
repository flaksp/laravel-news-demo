<article class="article">
    <header>
        <a href="{{ url('/articles/'.$article->id) }}"><h2>{{ $article->title }}</h2></a>

        @if (count($article->tags) > 0)
            <ul>
                @foreach ($article->tags as $tag)
                    <li>
                        <a href="{{ route('search_by_tag', $tag->tag) }}">{{ $tag->tag }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </header>

    @if ($article->cover_url)
        <p><img src="{{ $article->cover_url }}" alt="Cover"></p>
    @endif

    {{ $article->test_data }}

    @if (@$is_viewing_article)
        {!! $article->body_parsed !!}
    @else
        {!! $article->body_preview !!}
    @endif

    <footer>
        <p>
            Published <time datetime="{{ $article->created_at }}" title="{{ $article->created_at }}">{{ $article->created_ago }}</time>

            @if (@$is_viewing_article)
                <br>

                <a href="{{ route('edit_article', ['id' => $article->id]) }}">Edit this article</a>

                @if ($article->created_at != $article->updated_at)
                    (edited {{ $article->updated_ago }})
                @endif

                or share via {!! $social_buttons->vk() !!}, {!! $social_buttons->twitter() !!} &amp; {!! $social_buttons->facebook() !!}
            @endif
        </p>
    </footer>
</article>