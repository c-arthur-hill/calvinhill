<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calvin Hill</title>
        @vite(['resources/css/app.css'])
        <link rel="icon" type="image/x-icon" href="{{ Storage::disk('s3')->url('img/logo.ico') }}" >
    </head>
    <body class="p-3 p-lg-0">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <nav class="navbar navbar-expand">
                            <a class="navbar-brand nav-link" href="/">
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
        </div>
        @isset($success)
            @if($success)
                <div class="alert alert-success text-center rounded-0">
                    <span>Success! I'll be in touch shortly.</span>
                </div>
            @endif
        @endisset

        <div class="container">
            @yield('body')
        </div>

        @yield('javascript')
    </body>
</html>
