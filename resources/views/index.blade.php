@extends("base")

@section("styles")
    <style>
        .logo-filter {
           filter: grayscale(1);
            opacity: .5;
        }

        .profile {
            height: 100px;
            top: -20px;
            left: -20px;

        }

        .scissors {
            rotate: 270deg;
            height: 50px;
            top: -27.5px;
            right: 10px;
        }

        .bg-navy {
            background-color: #000080;

        }




    </style>

@endsection

@section("javascript")
    <script>
        function calcDays(seconds) {
            return Math.floor(seconds / 86400);

        }

        function calcHours(seconds) {
            return Math.floor(seconds / 3600);

        }

        function calcMinutes(seconds) {
            return Math.floor(seconds / 60);

        }

        function setTimer(){
            var days = calcDays(diff);
            var minusDays = diff - (days * 86400);
            var hours = calcHours(minusDays);
            var minusHours = minusDays - (hours * 3600);
            var minutes = calcMinutes(minusHours);
            var seconds = Math.floor(minusHours - (minutes * 60));
            timerElement.innerHTML = days + ' days<br>' + hours + ':' + minutes + ':' + seconds;
            diff = diff - 1;
        }

        var now = new Date();
        var last = new Date(now.getFullYear(), now.getMonth()+1,0);
        var diff = (last.getTime() - now.getTime()) / 1000;
        // in case of no js
        var timerParent = document.getElementById('timer-envelope');
        timerParent.classList.remove('d-none');
        var timerElement = document.getElementById('timer');
        setTimer();
        setInterval(setTimer, 1000);


    </script>

@endsection

@section('body')
<!--
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-1 mx-auto">
            <div style="overflow: hidden;" class="rounded-circle">
            </div>
        </div>
    </div>
</div>-->
<div class="container">
    <div class="row g-0 mt-5">
        <div class="col-lg-10 offset-lg-1">
            <div class="shadow" style="background-image: url({{ Storage::disk('s3')->url('img/white.png') }});">
                <div class="bg-navy text-white position-relative">
                    <img class="img-fluid d-md-block d-none rounded-circle position-absolute profile border border-white border-5" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">
                    <p class="text-center p-3 mb-0">100% Money back guarantee</p>
                </div>
                <div class="row g-0">
                    <div  class="col-lg-8 p-5">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <img class="img-fluid d-md-none d-block rounded-circle img-fluid w-25 mx-auto mb-3" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">
                                <h1 class="display-4 display-font">Business software development</h1>
                                <div class="">
                                    <p class="text-secondary mt-3"><strong class="text-dark">My special offer to you:</strong> When you send me the basic requirements of your software application project, you'll receive a personalized checklist of tasks any competent developer WILL deliver in their first two weeks of work.</p>
                                    <p class="text-secondary mt-3">I'll even tell you what I would charge.</p>
                                    <p class="text-secondary mt-3">No obligations. Completely confidential. Totally free.</p>
                                    <p class="text-secondary"><i style="font-family: cursive">-Calvin Hill</i></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 border-start bg-light">
                        <div class="h-100 p-3">
                            <form class="text-center" method="POST" action="{{ route('contact.update') }}">
                                <h5>Free task checklist</h5>
                                @if ($errors->any())
                                    <div class="alert alert-danger border-danger rounded-0">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-floating">
                                    <input autofocus="autofocus" value="{{ old('email') }}" id="email" type="email" name="email" class="form-control rounded-0">
                                    <label for="email" class="">Email*</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input  value="{{ old('name') }}" id="name" type="text" class="form-control rounded-0" name="name">
                                    <label for="name" class="">Your name*</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <textarea id="description" name="description" class="form-control rounded-0"> {{ old('description') }} </textarea>
                                    <label for="description" class="">Requirements of your software*</label>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-danger rounded-0">Claim your FREE task checklist<sup>&#8224;</sup></button>
                                </div>
                            </form>
                            <div id="timer-envelope" class="mt-3 text-center d-none">
                                <p><sup>&#8224;</sup>Offer subject to expiration in:</p>
                                <p class="h2" id="timer"></p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">
            <div class="border border-dark p-5 border-5 position-relative" style="border-style: dotted !important; background-color: ivory;">
                <img class="position-absolute scissors" src="{{ Storage::disk('s3')->url('img/scissors.svg') }}">
                <div class="row">
                    <div class="text-center col-12">
                        <h3 class="" style="font-weight: bold; font-family: serif;">Dadgummit! Are you mad as hell about your business software dumpster fire?</h3>
                        <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet diam tempus, rutrum augue pulvinar, commodo nisi. Mauris mollis imperdiet felis, sit amet porttitor diam sagittis ac. Praesent semper massa in ligula tempor ornare. Proin venenatis finibus interdum. Sed volutpat mattis feugiat. Ut malesuada rhoncus rhoncus.</p>
                        <h5 style="font-weight: bold; font-family: serif;">I promise to:</h5>

                        <!--<p>I've researched everything that goes into developing custom software economically and efficiently. It's too much to write here, so I put it all into this 48-page report. I've explained:</p>-->
                    </div>
                    <div class="col-lg-8 offset-lg-2 ">
                        <ol>
                            <li>Respond to any communication received during the work day within an hour</li>
                            <li>Agree on a clear list of planned work at the end of each meeting</li>
                            <li></li>
                            <li></li>
                            <li class="text-success"><strong>Return 100% of your money</strong> if you are not satisfied within two weeks of delivery</li>
                        </ol>

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="offset-lg-2 col-lg-3">
                        <img class="img-fluid badge-color" src="{{ Storage::disk('s3')->url('img/badge.png') }}">
                    </div>
                    <div class="col-lg-4">
                        <p style="font-family:cursive" class="h5 mt-5 mb-0">Calvin Hill</p>
                        <p class="text-secondary"><small>July 22, 2023</small></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="text-center col-8 mx-auto">
                        <p class="text-secondary">I encourage you to print this promise out and save it for your records.</p>
                        <button class="btn btn-outline-danger rounded-0">Print this promise for your records</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-light border-top border-bottom shadow mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row mt-3">
                    <div class="col-lg-4 text-center p-3 mb-3">
                        <h5 class="text-center"><i>"Tenacious"</i></h5>
                        <span class="text-warning">★★★★★</span>
                        <p class="text-center text-secondary">Calvin provided 3 proof-of-concepts for a cloud migration project. He finished deploying two legacy systems.</p>
                        <p class="mb-0">Gerardo</p>
                        <p class="mb-0 text-secondary"><small>Web applications director</small></p>

                    </div>
                    <div class="col-lg-4 text-center p-3 mb-3">
                        <h5 class="text-center"><i>"Practical and precise"</i></h5>
                        <span class="text-warning">★★★★★</span>
                        <p class="text-center text-secondary">Calvin built a workstation for automatically purchasing and printing thousands of shipping labels per hour.</p>
                        <p class="mb-0">Cory</p>
                        <p class="mb-0 text-secondary"><small>Private business owner</small></p>
                    </div>
                    <div class="col-lg-4 text-center p-3 mb-3">
                        <h5 class="text-center"><i>"A technical leader"</i></h5>
                        <span class="text-warning">★★★★★</span>
                        <p class="text-center text-secondary">He led development of a complex software-as-a-service tool for calculating sales commissions.</p>
                        <p class="mb-0">Darcy</p>
                        <p class="mb-0 text-secondary"><small>Project manager</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-10 offset-lg-1">
            <!--
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Services</h3>
                </div>
            </div>
            -->
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col mt-5">
                    <div class="shadow card h-100 rounded-0">
                        <div class="card-body">
                            <h5 class="card-title text-center">Plan</h5>
                            <p class="card-text text-muted">
                                Each project starts with gathering the basic requirements of the software application.
                            </p>
                            <p class="card-text text-muted">
                                Every two weeks, we meet to agree on a checklist of the highest-priority deliverables.
                            </p>
                        </div>
                        <img class="card-img-bottom p-3" src="{{ Storage::disk('s3')->url('img/undraw-1.svg') }}">
                    </div>
                </div>
                <div class="col mt-5">
                    <div class="shadow card h-100 rounded-0">
                        <div class="card-body">
                            <h5 class="card-title text-center">Develop</h5>
                            <p class="card-text text-muted">
                                I have experience writing complex business logic.
                            </p>
                            <p class="card-text text-muted">
                                I've supported thousands of requests per minute.
                            </p>
                            <p class="card-text text-muted">
                                I choose tools used by millions.
                            </p>
                        </div>
                        <img class="card-img-bottom p-3" src="{{ Storage::disk('s3')->url('img/undraw-2.svg') }}">
                    </div>
                </div>
                <div class="col mt-5">
                    <div class="shadow card h-100 rounded-0">
                        <div class="card-body">
                            <h5 class="card-title text-center">Deploy</h5>
                            <p class="card-text text-muted">
                                An application needs to be hosted on secure servers.
                            </p>
                            <p class="card-text text-muted">
                                My economical approach balances a rapid start with the flexibility to scale.
                            </p>
                        </div>
                        <img class="card-img-bottom p-3" src="{{ Storage::disk('s3')->url('img/undraw-3.svg') }}">
                    </div>
                </div>
            </div>
            <!--
            <div class="row mt-5">
                <h3 class="text-center">Reviews</h3>
            </div>-->
        </div>
    </div>
</div>
<div class="bg-light border-top border-bottom shadow">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row mt-5">
                    <div class="col-lg-5 offset-lg-1">
                        <img class="img-fluid border shadow" src="{{ Storage::url('/img/shipment.png') }}">
                    </div>
                    <div class="border shadow col-lg-5 p-3 bg-white">
                        <h3 class="text-center">Sample Screenshot</h3>
                        <p class="text-center text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet diam tempus, rutrum augue pulvinar, commodo nisi. Mauris mollis imperdiet felis, sit amet porttitor diam sagittis ac. Praesent semper massa in ligula tempor ornare. Proin venenatis finibus interdum. Sed volutpat mattis feugiat. Ut malesuada rhoncus rhoncus.</p>
                        <p class="text-center"><small><a href="">Learn more</a></small></p>
                    </div>

                </div>
                <div class="row mt-5 mb-5">
                    <div class="col-lg-5 offset-lg-1">
                        <img class="img-fluid border shadow" src="{{ Storage::url('/img/media.png') }}">
                    </div>
                    <div class="border shadow col-lg-5 p-3 bg-white">
                        <h3 class="text-center">Sample Screenshot</h3>
                        <p class="text-center text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet diam tempus, rutrum augue pulvinar, commodo nisi. Mauris mollis imperdiet felis, sit amet porttitor diam sagittis ac. Praesent semper massa in ligula tempor ornare. Proin venenatis finibus interdum. Sed volutpat mattis feugiat. Ut malesuada rhoncus rhoncus.</p>
                        <p class="text-center"><small><a href="">Learn more</a></small></p>
                    </div>

                </div>
                <div class="row mt-5 mb-5">
                    <div class="col-lg-5 offset-lg-1">
                        <img class="img-fluid border shadow" src="{{ Storage::url('/img/bulk.png') }}">
                    </div>
                    <div class="border shadow col-lg-5 p-3 bg-white">
                        <h3 class="text-center">Sample Screenshot</h3>
                        <p class="text-center text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet diam tempus, rutrum augue pulvinar, commodo nisi. Mauris mollis imperdiet felis, sit amet porttitor diam sagittis ac. Praesent semper massa in ligula tempor ornare. Proin venenatis finibus interdum. Sed volutpat mattis feugiat. Ut malesuada rhoncus rhoncus.</p>
                        <p class="text-center"><small><a href="">Learn more</a></small></p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-6 col-lg-2 mt-5 text-center logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/php-logo.svg')}}">
                    </div>
                    <div class="col-6 col-lg-2 mt-5 text-center logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/laravel-logo.svg')}}">
                    </div>
                    <div class="col-6 col-lg-2 mt-5 text-center logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/symfony-logo.svg')}}">
                    </div>
                    <div class="col-6 col-lg-2 mt-5 text-center logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/vue-logo.svg')}}">
                    </div>
                    <div class="col-6 col-lg-2 mt-5 text-center logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/bootstrap-logo.svg')}}">

                    </div>
                    <div class="col-6 col-lg-2 mt-5 text-center logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/heroku-logo-stroke-purple.svg')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-light mt-5 border-top shadow">
    <div class="container">
        <div class="row bg-light">
            <div class="p-3 text-center col-lg-5 mx-auto">
                <h5>Calvin Hill</h5>
                <p class="text-secondary">Tallahassee, Florida<br>calvin@calvinhill.com</p>
                <small><a href="https://www.vecteezy.com/vector-art/13671294-guarantee-satisfaction-100-percent-in-gold-and-emboss-design">Guarantee image</a> by Vecteezy</small>
            </div>
        </div>
    </div>
</div>
@endsection
