@extends('layouts.app')

@section('title', 'Search by tags')

@section('content')
    @if (count($tags) === 0)
        Seems like there is no tagged articles in database. Maybe it's good reason <a href="{{ route('create_article') }}">to write anything</a>?
    @else
        <h2>List of tags:</h2>

        <ul>
            @foreach ($tags as $tag)
                <li>
                    <a href="{{ route('search_by_tag', ['tag' => $tag->tag]) }}">{{ $tag->tag }}</a>
                </li>
            @endforeach
        </ul>

        {{ $tags->links() }}
    @endif
@endsection