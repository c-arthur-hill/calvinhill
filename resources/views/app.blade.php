<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calvin Hill</title>
        @vite(['resources/css/app.css'])
        @yield('head')
        <link rel="icon" type="image/x-icon" href="{{ Storage::disk('s3')->url('img/logo.ico') }}" >
    </head>
    <body class="p-3 p-lg-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img src="{{ Storage::disk('s3')->url('img/logo.svg') }}"  height="24" class="d-inline-block align-text-top">
                            Calvin Hill
                        </a>
                        <ul class="ms-auto navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('articles')  }}" >
                                    Article list
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
