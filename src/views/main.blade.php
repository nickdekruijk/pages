<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ @$page->description }}">
    	<title>{{ @$page->html_title }}</title>
    	<style>
        	body {margin:0;font-family:sans-serif;color:#333;line-height:1.5;-webkit-font-smoothing:antialiased;-moz-font-smoothing:grayscale;-moz-osx-font-smoothing:grayscale}
        	.nav {position:fixed;left:0;right:0;top:0;background-color:rgba(127,127,127,0.2);line-height:50px;white-space:nowrap;z-index:1000}
        	* {box-sizing:border-box}
        	.content {min-height:calc(100vh - 100px)}
        	.container {position:relative}
        	.footer .container {padding:0 2px}
        	.article {padding:1px 2%}
        	.footer {line-height:100px;background-color:#334;color:rgba(255,255,255,0.8)}
        	A {text-decoration:none;color:inherit}
        	.nav-logo {font-weight:100;font-size:1.5em}
        	.mw-1140 {max-width:1140px;margin-left:auto;margin-right:auto}
        	.nav-burger {display:none;position:absolute;right:0;padding:11px 2%;z-index:1}
        	.nav-burger > span {display:block;background-color:#0cb;height:4px;width:22px;margin:4px;border-radius:2px}
        	#nav-toggle {display:none}
        	.nav UL {display:block;margin:0;padding:0}
        	.nav UL > LI {display:inline-block;margin:0;padding:0px 10px}
        	.nav UL UL {display:none;position:absolute;background-color:rgba(127,127,127,0.2);margin:0 -10px;line-height:2.5em}
        	.nav LI:hover > UL {display:block}
        	.nav LI LI {display:block}
        	.nav LI.active > A {color:#178}
        	.nav A {display:block}
        	.nav LI:hover, .nav-logo:hover {background-color:rgba(0,0,0,0.1)}
        	.nav-logo {float:left;display:block;padding:0px 2%;color:#178}
        	.right {float:right}
        	.bigimg {height:33.33333vw;background-position:center center;background-size:cover}
        	.footer a {color:#fff}
        	.footer a:hover {text-decoration:underline}
        	h1 {font-size:2em;font-weight:100;margin:0.75em 0 0}
        	h2 {font-size:1.5em;font-weight:100;margin:0.75em 0 0}
        	p {margin:0.5em 0}
            @media (max-width: 750px) {
            	.nav .nav0 {position:fixed;top:0px;bottom:0;right:0;width:200px;transform:translateX(200px);transition:transform .4s;background-color:#eee}
            	.nav .nav0 > LI {display:block}
            	.nav UL UL {position:relative;display:block;background-color:transparent}
            	.nav LI LI {padding-left:20px;font-size:0.95em}
            	.nav-burger {display:block}
                .nav LI:hover, .nav-logo:hover {background-color:transparent}
                #nav-toggle:checked ~ .nav .nav0 {display:block;transform:translateX(0)}
        	}
        </style>
    </head>
    <body>
        <input type="checkbox" id="nav-toggle">
        <nav class="nav" role="navigation" aria-label="main navigation" class="nav" id="nav">
            <a class="nav-logo" href="/">LaraPages</a>
            <label class="nav-burger" for="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <div class="mw-1140">
            {!! $navigationHtml !!}
            </div>
        </nav>
        <section class="content">
            <div class="bigimg" style="background-image:url('//picsum.photos/1500/500/')"></div>
            <div class="container mw-1140">
                @yield('content')
            </div>
        </section>
        <footer class="footer">
            <div class="container mw-1140">
                &copy; {{ date('Y') }} <a href="https://larapages.nl">LaraPages</a>
                <a class="right" target="_blank" href="https://github.com/larapages">Visit us on GitHub</a>
            </div>
        </footer>
    </body>
</html>