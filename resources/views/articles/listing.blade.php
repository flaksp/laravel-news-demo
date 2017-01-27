@extends('layouts.app')

@section('title', 'List of articles')

@section('content')
    @if (count($articles) === 0)
        Seems like there is no articles in database. Maybe it's good reason <a href="{{ route('create_article') }}">to write anything</a>?
    @else
        @foreach ($articles as $article)
            @include('articles.components.body', ['article' => $article])
        @endforeach

        {{ $articles->links() }}
    @endif
@endsection