<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css'])
        <link rel="icon" type="image/x-icon" href="{{ Storage::disk('s3')->url('img/logo.ico') }}" >@isset($success) @if($success)<!-- Google tag (gtag.js) --><script async src="https://www.googletagmanager.com/gtag/js?id=AW-917742191"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'AW-917742191');</script><!-- Event snippet for Website sale conversion page --> <script> gtag('event', 'conversion', { 'send_to': 'AW-917742191/gy8ACJjEs6cYEO_EzrUD', 'transaction_id': '{{ $contactID }}' }); </script>@endif @endisset
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-T9PH83550W"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-T9PH83550W');
        </script>
        @yield('styles')
        @yield('head')
    </head>
    <body class="">
        <div class="min-vh-100">
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 offset-lg-1">
                            <nav class="navbar navbar-expand p-3">
                                <a class="navbar-brand nav-link" href="/">
                                    <img src="{{ Storage::disk('s3')->url('img/logo.svg') }}"  height="24" class="d-inline-block align-text-top">
                                    <span>Calvin Hill</span>
                                </a>

                                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark text-decoration-underline" href="{{ url('articles') }}" >
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

            @yield('body')

        </div>
        <div class=" mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 offset-lg-1">
                        <div class="p-3">
                            <img src="{{ Storage::disk('s3')->url('img/logo.svg') }}"  height="24" class="d-inline-block align-text-top">
                            Calvin Hill
                            <p class="">calvin@calvinhill.com<br>Tallahassee, Florida</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @yield('javascript')
    </body>
</html>
