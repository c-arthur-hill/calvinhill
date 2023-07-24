<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calvin Hill</title>
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
    </head>
    <body class="">
        <!--
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
        -->
        @isset($success)
            @if($success)
                <div class="alert alert-success text-center rounded-0">
                    <span>Success! I'll be in touch shortly.</span>
                </div>
            @endif
        @endisset

        @yield('body')
        <div class="bg-light mt-5 border-top shadow">
            <div class="container">
                <div class="row bg-light">
                    <div class="p-3 text-center col-lg-5 mx-auto">
                        <h5><img src="{{ Storage::disk('s3')->url('img/logo.svg') }}"  height="24" class="d-inline-block align-text-top">
                            Calvin Hill</h5>
                        <p class="text-secondary">Tallahassee, Florida<br>calvin@calvinhill.com</p>
                        <small class="text-secondary"><a class="text-secondary" href="https://www.vecteezy.com/vector-art/13671294-guarantee-satisfaction-100-percent-in-gold-and-emboss-design">Guarantee image</a> by Vecteezy</small>
                    </div>
                </div>
            </div>
        </div>

        @yield('javascript')
    </body>
</html>
