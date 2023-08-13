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
    <div class="row">
        <div class="col-lg-1 col-4">
            <div class="pt-3 pb-3">
                <img class="img-fluid rounded-circle" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">

            </div>
        </div>
        <div  class="col-lg-5" >
            <div class="   h-100   " >
                <div class="p-3">
                    <p class="">100% Money back guarantee</p>
                    <h1 class="display-font display-4">Business software development services</h1>
                    <h5>
                        <ul class=" list-unstyled" >
                            <li>Lower costs</li>
                            <li>Accelerate development</li>
                            <li>Increase user productivity</li>
                        </ul>
                    </h5>
                    <p><i>Through <a href="/articles">software complexity measurement</a></i></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="h-100 ">
                <div class="p-3" id="offer">
                    <!--<img class="position-absolute d-print-none scissors" src="{{ Storage::disk('s3')->url('img/scissors.svg') }}">-->
                    <form class="" method="POST" action="{{ route('contact.update') }}">
                        <h3>Get the latest research on cheap, fast and productive business software development</h3>
                        <p>Free weekly email summary. No obligation. Completely confidential.</p>
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
                            <textarea id="description" name="description" rows="3" class="d-none form-control h-100  rounded-0">WEEKLY</textarea>
                            <!--<label for="description" class="">Software application requirements*</label>-->
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-danger shadow rounded-0">Subscribe to free weekly email</button>
                        </div>
                    </form>
                    <!--
                    <div id="timer-envelope" class="mt-3  d-none">
                        <p><sup>&#8224;</sup>Offer subject to expiration in:</p>
                        <p class="h3" id="timer"></p>

                    </div>
                    -->
                </div>
                <!--
                <div class="bg-dark text-light  p-3">
                    Offer ID #{{ $checklists }}
                </div>
                -->

            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-1">
                <div class="ps-3 pe-3 pt-3">
                    <h3>Reviews</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <div class="   p-3  h-100   ">
                            <h5 class=""><i>"Tenacious"</i></h5>
                            <span class="text-warning h3">★★★★★</span>
                            <p class="">Calvin provided 3 proof-of-concepts for a cloud migration project. He finished deploying two legacy systems.</p>
                            <p class="mb-0"><strong>Gerardo</strong></p>
                            <p class="mb-0 ">Web applications director</p>

                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="    p-3 h-100   ">
                            <h5 class=""><i>"Practical and precise"</i></h5>
                            <span class="text-warning h3">★★★★★</span>
                            <p class=" ">Calvin built a workstation for automatically purchasing and printing thousands of shipping labels per hour.</p>
                            <p class="mb-0"><strong>Cory</strong></p>
                            <p class="mb-0 ">Private business owner</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="   p-3  h-100   ">
                            <h5 class=""><i>"A technical leader"</i></h5>
                            <span class="text-warning h3">★★★★★</span>
                            <p class="">He led development of a complex software-as-a-service tool for calculating sales commissions.</p>
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
        <div class="col-lg-9 offset-lg-1">
            <div class="ps-3 pt-3 pe-3 ">
                <h3>Services</h3>
            </div>

            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col">
                    <div class=" h-100    p-3">
                        <div class="">
                            <h5 class="">Plan</h5>
                            <p class="">
                                Each project starts with gathering the basic requirements of the software application.
                            </p>
                            <p class="">
                                Then I send short consistent updates on progress and obstacles.
                            </p>
                        </div>
                        <img class="img-fluid p-3" src="{{ Storage::disk('s3')->url('img/undraw-1.svg') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="h-100    p-3">
                        <div class="">
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
                <div class="col">
                    <div class="h-100    p-3">
                        <div class="">
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
                <h3 class="">Reviews</h3>
            </div>-->
        </div>
    </div>
</div>
<!--
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <h3>Technical case studies</h3>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row mt-3">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="p-3 p-lg-0 ">
                            <img class="img-fluid" src="{{ Storage::disk('s3')->url('/img/shipment.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="  p-3 h-100   ">
                            <h5 class="">Printing shipping labels</h5>
                            <p class=" ">Learn how I used modern frontend technologies to remove a bottleneck in a manufacturing station.</p>
                            <p class=""><a target="_blank" href="{{ route('shipment') }}">Read</a></p>
                        </div>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="p-3 p-lg-0  ">
                            <img class="img-fluid" src="{{ Storage::disk('s3')->url('/img/media.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="  p-3 h-100   ">
                            <h5 class="">Managing art files</h5>
                            <p class=" ">Here I discuss developing user-friendly software.</p>
                            <p class=""><a target="_blank" href="{{ route('media.index') }}">Read</a></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="p-3 p-lg-0  ">
                            <img class="img-fluid " src="{{ Storage::disk('s3')->url('/img/bulk.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="  p-3 h-100   ">
                            <h5 class="">Performing bulk corrections</h5>
                            <p class=" ">This case study reviews my incremental approach to delivering business value.</p>
                            <p class=""><a target="_blank" href="{{ route('media.bulk.edit') }}">Read</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!--
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto  p-5">
                <h3>Ready now?</h3>
                <a class="btn btn-outline-danger btn-lg rounded-0" href="#offer">Get started</a>
                <div class="row">
                    <div class="col-6 col-lg-2 mt-5  logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/php-logo.svg')}}">
                    </div>
                    <div class="col-6 col-lg-2 mt-5  logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/laravel-logo.svg')}}">
                    </div>
                    <div class="col-6 col-lg-2 mt-5  logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/symfony-logo.svg')}}">
                    </div>
                    <div class="col-6 col-lg-2 mt-5  logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/vue-logo.svg')}}">
                    </div>
                    <div class="col-6 col-lg-2 mt-5  logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/bootstrap-logo.svg')}}">

                    </div>
                    <div class="col-6 col-lg-2 mt-5  logo-filter">
                        <img class="w-25" src="{{ Storage::disk('s3')->url('img/heroku-logo-stroke-purple.svg')}}">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
-->
@endsection
