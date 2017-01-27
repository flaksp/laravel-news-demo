@extends('layouts.app')

@if (@$article->title)
    @section('title', 'Edit article &mdash; '.$article->title)
@else
    @section('title', 'Create article')
@endif

@section('content')
    <form method="post">
        {{ csrf_field() }}

        <fieldset>
            <section>
                <label for="title">Article title</label>
                <input type="text" minlength="10" maxlength="255" name="title" id="title" value="{{ @$article->title }}" required>

                @if ($errors->has('title'))
                    <p>
                        <strong>Warning:</strong> {{ $errors->first('title') }}
                    </p>
                @endif
            </section>

            <section>
                <label for="body">Article body</label>
                <textarea minlength="20" maxlength="65535" name="body" id="body" rows="5" required>{{ @$article->body }}</textarea>
                <small>Simple <a href="http://daringfireball.net/projects/markdown/syntax" target="_blank" rel="noopener">markdown</a> is supported</small>

                @if ($errors->has('body'))
                    <p>
                        <strong>Warning:</strong> {{ $errors->first('body') }}
                    </p>
                @endif
            </section>

            <section>
                <label for="cover_url">Image cover URL</label>
                <input type="url" maxlength="255" name="cover_url" id="cover_url" value="{{ @$article->cover_url }}">

                @if ($errors->has('cover_url'))
                    <p>
                        <strong>Warning:</strong> {{ $errors->first('cover_url') }}
                    </p>
                @endif
            </section>

            <section>
                <label for="tags">Tags</label>
                <input type="text" maxlength="255" name="tags" id="tags" value="{{ @$article->comma_separated_tags }}">
                <small>Comma-separated list of tags</small>

                @if ($errors->has('tags'))
                    <p>
                        <strong>Warning:</strong> {{ $errors->first('tags') }}
                    </p>
                @endif
            </section>

            <section>
                {!! Recaptcha::render() !!}

                @if ($errors->has('g-recaptcha-response'))
                    <p>
                        <strong>Warning:</strong> {{ $errors->first('g-recaptcha-response') }}
                    </p>
                @endif
            </section>

            <section>
                @if (@$article->id)
                    <label>
                        <input type="checkbox" name="remove" id="remove" value="yes"> Remove article
                    </label>

                    @if ($errors->has('remove'))
                        <p>
                            <strong>Warning:</strong> {{ $errors->first('remove') }}
                        </p>
                    @endif
                @endif
            </section>

            <section>
                <input type="hidden" name="id" value="{{ @$article->id }}">

                @if ($errors->has('id'))
                    <p>
                        <strong>Warning:</strong> {{ $errors->first('id') }}
                    </p>
                @endif

                <button type="submit">Submit</button>
            </section>
        </fieldset>
    </form>
@endsection