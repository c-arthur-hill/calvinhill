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
            height: 40px;
            top: -22.5px;
            right: 5px;
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
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        var now = new Date();
        //document.getElementById('date-now').innerHTML = monthNames[now.getMonth()] + ' ' + now.getDate() + ', ' + now.getFullYear();
        var last = new Date(now.getFullYear(), now.getMonth()+1,0);
        var diff = (last.getTime() - now.getTime()) / 1000;
        // in case of no js
        var timerParent = document.getElementById('timer-envelope');
        timerParent.classList.remove('d-none');
        var timerElement = document.getElementById('timer');
        setTimer();
        setInterval(setTimer, 1000);

        function printPromise()
        {
            var printWindow = window.open('', 'PRINT');
            printWindow.document.write('<html><body>' + document.getElementById('my-promise').innerHTML + '</body></html>');
            let toHide = printWindow.document.getElementsByClassName('d-print-none');
            for( let i = 0; i < toHide.length; ++i) {
                toHide[i].style.display = 'none';
            }
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
            return true;
        }




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
<div class="container" >
    <div class="row mt-3 mt-lg-5">
        <div  class="col-lg-8" >
            <div class="shadow bg-light  h-100  shadow bg-light" >
                <div class="position-relative bg-navy text-white">
                    <img class="img-fluid rounded-circle position-absolute profile d-none d-lg-block" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">
                    <p class="text-center p-3 mb-0">100% Money back guarantee</p>
                </div>
                <div class="p-3">
                    <div class="row">
                        <div class="col-12 col-lg-10 offset-lg-1">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle w-25 mx-auto d-lg-none" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">
                                <h1 class="display-4 display-font">Business software application development</h1>
                                <h5>I promise you:</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 col-lg-6 mx-auto">
                            <ul class="" style="list-style-type: square;">
                                <li>Economical solutions to business software sticking points</li>
                                <li>100% money back if you're not satisfied</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-10 offset-lg-1">
                            <div class="text-center">
                                <h3><i>Building a prosperous and efficient future together</i></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--
                        <div class="col-6 col-lg-3 offset-3">
                            <img class="img-fluid badge-color d-print-none" src="{{ Storage::disk('s3')->url('img/badge.png') }}">
                        </div>-->
                        <div class="col-lg-3 mx-auto text-center">
                            <!--<p style="font-family:cursive" class="h5 mt-lg-5 mb-0">Calvin Hill</p>-->
                            <h5 style="font-family: serif !important;" class="mt-lg-3"><img src="{{ Storage::disk('s3')->url('img/logo.svg') }}"  height="24" class="d-inline-block align-text-top">
                                Calvin Hill</h5>
                            <p class="">calvin@calvinhill.com</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="h-100">
                <div class="border border-dark border-bottom-0 border-5 position-relative p-3 mt-3 mt-lg-0" style="border-style: dashed !important;" id="offer">
                    <img class="position-absolute d-print-none scissors" src="{{ Storage::disk('s3')->url('img/scissors.svg') }}">
                    <form class="text-center" method="POST" action="{{ route('contact.update') }}">
                        <!--<h5><strike>$120</strike> <span class="text-success">FREE</span> checklist</h5>-->
                        <!--<h3 class=""><strong>Limited time offer: <strike>$120</strike> <span class="text-success">FREE</span> personalized 10+ point checklist</strong></h3>-->
                        <h3 class=""><strong><strike>$120</strike> <span class="text-success">FREE</span> sticking point checklist</strong></h3>
                        <p class="">Avoid these 13 common sticking points I've solved in real software applications.</p>
                        <p>No obligation. Completely confidential.</p>
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
                            <label for="email form-control-sm" class="">Your email*</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input  value="FREE" id="name" type="hidden" class="form-control form-control-sm rounded-0" name="name">
                            <!--<label for="name" class="">Your name*</label>-->
                        </div>
                        <div class="form-floating mt-3">
                            <textarea id="description" name="description" rows="3" class="d-none form-control h-100  rounded-0">GENERIC</textarea>
                            <!--<label for="description" class="">Software application requirements*</label>-->
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-danger shadow rounded-0">Get the <strike>$120</strike> FREE sticking point checklist<sup>&#8224;</sup></button>
                        </div>
                    </form>
                    <div id="timer-envelope" class="mt-3 text-center d-none">
                        <p><sup>&#8224;</sup>Offer subject to expiration in:</p>
                        <p class="h3" id="timer"></p>

                    </div>
                </div>
                <div class="bg-dark text-light text-center p-3">
                    Offer ID #{{ $checklists }}
                </div>

            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <h3>Reviews</h3>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-4 mb-3">
                        <div class=" shadow bg-light p-3 text-center h-100  shadow bg-light">
                            <h5 class="text-center"><i>"Tenacious"</i></h5>
                            <span class="text-warning h3">★★★★★</span>
                            <p class="text-center">Calvin provided 3 proof-of-concepts for a cloud migration project. He finished deploying two legacy systems.</p>
                            <p class="mb-0"><strong>Gerardo</strong></p>
                            <p class="mb-0 ">Web applications director</p>

                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class=" shadow bg-light text-center p-3 h-100  shadow bg-light">
                            <h5 class="text-center"><i>"Practical and precise"</i></h5>
                            <span class="text-warning h3">★★★★★</span>
                            <p class="text-center ">Calvin built a workstation for automatically purchasing and printing thousands of shipping labels per hour.</p>
                            <p class="mb-0"><strong>Cory</strong></p>
                            <p class="mb-0 ">Private business owner</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class=" shadow bg-light p-3 text-center h-100  shadow bg-light">
                            <h5 class="text-center"><i>"A technical leader"</i></h5>
                            <span class="text-warning h3">★★★★★</span>
                            <p class="text-center">He led development of a complex software-as-a-service tool for calculating sales commissions.</p>
                            <p class="mb-0"><strong>Darcy</strong></p>
                            <p class="mb-0 ">Project manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h3>Services</h3>
                </div>

            </div>
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col mt-3">
                    <div class=" h-100  shadow bg-light p-3">
                        <div class="text-center">
                            <h5 class="">Plan</h5>
                            <p class="">
                                Each project starts with gathering the basic requirements of the software application.
                            </p>
                            <p class="">
                                Every two weeks, we meet to agree on a checklist of the highest-priority deliverables.
                            </p>
                        </div>
                        <img class="img-fluid p-3" src="{{ Storage::disk('s3')->url('img/undraw-1.svg') }}">
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="h-100  shadow bg-light p-3">
                        <div class="text-center">
                            <h5 class="">Develop</h5>
                            <p class="">
                                I have experience writing complex business logic.
                            </p>
                            <p class="">
                                I've supported thousands of requests per minute.
                            </p>
                            <p class="">
                                I choose tools used by millions.
                            </p>
                        </div>
                        <img class="p-3 img-fluid" src="{{ Storage::disk('s3')->url('img/undraw-2.svg') }}">
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="h-100  shadow bg-light p-3">
                        <div class="text-center">
                            <h5>Deploy</h5>
                            <p class="">
                                An application needs to be hosted on secure servers.
                            </p>
                            <p class="">
                                My approach balances a rapid start with the flexibility to scale.
                            </p>
                        </div>
                        <img class="p-3 img-fluid" src="{{ Storage::disk('s3')->url('img/undraw-3.svg') }}">
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
<div class="">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h3>Technical case studies</h3>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row mt-3">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="p-3 p-lg-0 shadow">
                            <img class="img-fluid" src="{{ Storage::disk('s3')->url('/img/shipment.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="  p-3 h-100  shadow bg-light">
                            <h5 class="text-center">Printing shipping labels</h5>
                            <p class="text-center ">Learn how I used modern frontend technologies to remove a bottleneck in a manufacturing station.</p>
                            <p class="text-center"><a target="_blank" href="{{ route('shipment') }}">Read</a></p>
                        </div>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="p-3 p-lg-0  shadow">
                            <img class="img-fluid" src="{{ Storage::disk('s3')->url('/img/media.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="  p-3 h-100  shadow bg-light">
                            <h5 class="text-center">Managing art files</h5>
                            <p class="text-center ">Here I discuss developing user-friendly software.</p>
                            <p class="text-center"><a target="_blank" href="{{ route('media.index') }}">Read</a></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="p-3 p-lg-0 shadow ">
                            <img class="img-fluid " src="{{ Storage::disk('s3')->url('/img/bulk.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="  p-3 h-100  shadow bg-light">
                            <h5 class="text-center">Performing bulk corrections</h5>
                            <p class="text-center ">This case study reviews my incremental approach to delivering business value.</p>
                            <p class="text-center"><a target="_blank" href="{{ route('media.bulk.edit') }}">Read</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="">
    <!--
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto text-center p-5">
                <h3>Ready now?</h3>
                <a class="btn btn-outline-danger btn-lg rounded-0" href="#offer">Get started</a>
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
        </div>-->
    </div>
</div>
@endsection
