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

        .bg-navy {
            background-color: #000080;
        }


    </style>

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
            <img class="img-fluid d-md-none d-block rounded-circle img-fluid w-25 mx-auto mb-3" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">
            <div class="shadow" style="background-image: url({{ Storage::disk('s3')->url('img/white.png') }});">
                <div class="bg-navy text-white position-relative">
                    <img class="img-fluid d-md-block d-none rounded-circle position-absolute profile border border-white border-5" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">
                    <p class="text-center p-3 mb-0">100% Money back guarantee</p>
                </div>
                <div class="row">
                    <div  class="col-lg-8 p-5">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h1 class="display-4 display-font">Software application development</h1>
                                <p class="text-secondary mt-3"><i>Professional. Experienced.</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <form class="p-3 bg-light border-start h-100 text-center" method="POST" action="{{ route('contact.update') }}">
                            <h3>Get started now</h3>
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
                                <label for="name" class="">Name*</label>
                            </div>
                            <div class="form-floating mt-3">
                                <textarea id="description" name="description" class="form-control rounded-0"> {{ old('description') }} </textarea>
                                <label for="description" class="">Project description*</label>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-danger btn-lg rounded-0">Get started now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                Each project starts with a step-by-step plan.
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
                <div class="row mt-3">
                    <div class="col-lg-4 text-center p-3 mb-3">
                        <h5 class="text-center"><i>"Tenacious"</i></h5>
                        <span class="text-warning">★★★★★</span>
                        <p class="text-center text-secondary">Calvin provided 3 proof-of-concepts for a cloud migration project. He finished deploying two legacy systems.</p>
                        <p class="mb-0">Gerardo Garcia</p>
                        <p class="mb-0 text-secondary"><small>Web Applications Director, Florida State University (former)</small></p>

                    </div>
                    <div class="col-lg-4 text-center p-3 mb-3">
                        <h5 class="text-center"><i>"Practical and precise"</i></h5>
                        <span class="text-warning">★★★★★</span>
                        <p class="text-center text-secondary">Calvin built a workstation for automatically purchasing and printing thousands of shipping labels per hour.</p>
                        <p class="mb-0">Cory Hekimian-Williams</p>
                        <p class="mb-0 text-secondary"><small>Owner & CEO, StudioXMedia</small></p>
                    </div>
                    <div class="col-lg-4 text-center p-3 mb-3">
                        <h5 class="text-center"><i>"A technical leader"</i></h5>
                        <span class="text-warning">★★★★★</span>
                        <p class="text-center text-secondary">He led development of a complex SAAS tool for calculating sales commissions.</p>
                        <p class="mb-0">Darcy St. George</p>
                        <p class="mb-0 text-secondary"><small>Project Manager, Level 6 Marketing</small></p>
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
<!--
<div class="bg-light border-top border-bottom shadow">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row mt-5">
                    <div class="col-lg-5 offset-lg-1">
                        <img class="img-fluid border shadow" src="{{ Storage::url('/img/screen1.png') }}">
                    </div>
                    <div class="border shadow col-lg-5 p-3 bg-white">
                        <h3 class="text-center">Sample Screenshot</h3>
                        <p class="text-center text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet diam tempus, rutrum augue pulvinar, commodo nisi. Mauris mollis imperdiet felis, sit amet porttitor diam sagittis ac. Praesent semper massa in ligula tempor ornare. Proin venenatis finibus interdum. Sed volutpat mattis feugiat. Ut malesuada rhoncus rhoncus.</p>
                    </div>

                </div>
                <div class="row mt-5 mb-5">
                    <div class="col-lg-5 offset-lg-1">
                        <img class="img-fluid border shadow" src="{{ Storage::url('/img/screen2.png') }}">
                    </div>
                    <div class="border shadow col-lg-5 p-3 bg-white">
                        <h3 class="text-center">Sample Screenshot</h3>
                        <p class="text-center text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet diam tempus, rutrum augue pulvinar, commodo nisi. Mauris mollis imperdiet felis, sit amet porttitor diam sagittis ac. Praesent semper massa in ligula tempor ornare. Proin venenatis finibus interdum. Sed volutpat mattis feugiat. Ut malesuada rhoncus rhoncus.</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
-->
<div class="bg-light mt-5 border-top shadow">
    <div class="container">
        <div class="row bg-light">
            <div class="p-3 text-center col-lg-5 mx-auto">
                <p class="text-secondary">Tallahassee, Florida<br>calvin@calvinhill.com</p>
            </div>
        </div>
    </div>
</div>
@endsection
