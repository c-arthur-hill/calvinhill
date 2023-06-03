<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calvin Hill</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css'])
        @yield('head')
        <link rel="icon" type="image/x-icon" href="{{ Storage::disk('s3')->url('img/logo.ico') }}" ><!-- Google tag (gtag.js) --><script async src="https://www.googletagmanager.com/gtag/js?id=AW-917742191"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'AW-917742191');</script>

    </head>
    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <nav class="navbar navbar-expand">
                        <a class="navbar-brand" href="/">
                            <img src="{{ Storage::disk('s3')->url('img/logo.svg') }}"  height="24" class="d-inline-block align-text-top">
                            Calvin Hill
                        </a>
                        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('about') }}" >
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('articles') }}" >
                                    Articles
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    <div class="min-vh-100">
        @yield('body')
    </div>
    <div class="p-3">
        <p class="mt-3 text-center text-secondary">calvin@calvinhill.com</p>
    </div>

    </body>
</html>
