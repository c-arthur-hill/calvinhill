<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calvin Hill</title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="">
        <div class="min-vh-100">
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
                                    <a class="nav-link " href="{{ url('articles') }}" >
                                        Article list
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
            @yield('body')
        </div>

        @yield('javascript')
    </body>
</html>
