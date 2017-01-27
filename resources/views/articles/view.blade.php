@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->body_preview)

@if (@$article->cover_url)
    @section('image', $article->cover_url)
@endif

@section('content')
    <section>
        @include('articles.components.body', ['article' => $article, 'is_viewing_article' => true])
    </section>

    <section>
        <div id="vk_comments"></div>

        <script>
            window.onload = function () {
                VK.init({
                    apiId: {{ env('VK_COMMENTS_APP_ID') }},
                    onlyWidgets: true
                });

                VK.Widgets.Comments('vk_comments', {
                    pageUrl: '{{ url()->full() }}'
                }, {{ $article->id }});
            }
        </script>
    </section>
@endsection