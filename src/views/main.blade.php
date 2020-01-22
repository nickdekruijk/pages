<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ @$page->description }}">
    	<title>{{ @$page->html_title }}</title>
    	{!! Minify::stylesheet(['../resources/css/utility.css', '../resources/css/styles.scss']) !!}
    </head>
    <body class="smooth">
        <input type="checkbox" id="nav-toggle">
        <nav class="nav" aria-label="main navigation" id="nav">
            <div class="max-width">
                <a href="/"><img class="nav-logo" alt="Logo"></a>
                <label class="nav-burger" for="nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
                {!! isset($PageController) ? $PageController->nav : Page::navigation() !!}
            </div>
        </nav>
        <div class="flex has-footer">
            <section class="content">
                @yield('content')
            </section>
            <footer class="footer">
                <div class="max-width">
                    &copy; {{ date('Y') }} <a href="https://nickdekruijk.nl">Nick de Kruijk</a>
                    <a class="right" target="_blank" href="https://github.com/nickdekruijk">Visit me on GitHub</a>
                </div>
            </footer>
        </div>
        {!! Minify::javascript(['../resources/js/scripts.js']) !!}
    </body>
</html>
