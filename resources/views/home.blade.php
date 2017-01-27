@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Simple demo which demonstrates creating, viewing, editing and removing operations (CRUD) over articles')

@section('content')
    <p>Simple demo which demonstrates <a href="{{ route('create_article') }}">creating</a>, viewing, editing and removing operations (<abbr title="Create Read Update Delete">CRUD</abbr>) over <a href="{{ route('listing_of_articles') }}">articles</a>. It also has a pagination. And supports markdown. Powered with Laravel 5.4 and ❤️️.</p>

    <p>Created by <a href="https://github.com/terron-kun" target="_blank" rel="noopener">terron-kun</a> as a demonstrative project. See sources at <a href="https://github.com/terron-kun/laravel-news-demo" target="_blank" rel="noopener">GitHub</a>.</p>
@endsection
