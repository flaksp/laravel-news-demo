<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/Webpage">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('description')">

    <title>@yield('title')</title>

    <!-- Schema.org markup (Google) -->
    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('description')">
    <meta itemprop="image" content="@yield('image')">

    <!-- Twitter Card markup-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:creator" content="@terron-kun">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image" content="@yield('image')">
    <meta name="twitter:image:alt" content="Cover">

    <!-- Open Graph markup (Facebook, Pinterest) -->
    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="article">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <style>{!! file_get_contents(public_path().'/css/app.css') !!}</style>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans|PT+Serif:400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <header>
        <h1>Laravel news demo</h1>
        <p><i>A bit more than lorem ipsum</i></p>

        <nav>
            <ul>
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('listing_of_articles') }}">Articles</a>
                </li>
                <li>
                    <a href="{{ route('create_article') }}">Create an article</a>
                </li>
                <li>
                    <a href="{{ route('tags_listing') }}">Search</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div hidden>Generated in {{ round(microtime(true) - LARAVEL_START, 3) }} sec</div>
        <p><a href="https://github.com/terron-kun" target="_blank" rel="noopener">terron-kun</a></p>
    </footer>

    <!-- Scripts
    <script src="/js/app.js"></script>-->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://vk.com/js/api/openapi.js"></script>
</body>
</html>