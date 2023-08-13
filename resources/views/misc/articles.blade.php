@extends('base')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-1 d-none d-lg-block">
                <div class="pt-3 pb-3">
                    <img class="img-fluid rounded-circle" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">

                </div>
            </div>
            <div class="col-lg-5">
                <div class="p-3">
                    <h1 class="display-4">Software complexity measurement lowers costs, accelerates development and increases user productivity.</h1>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3 mb-3  ">
                    <h3>Simple vs complex software</h3>
                    <p>Complexity is the quality of having many and varied interactions between the parts of a whole.</p>
                    <a href="/article/simple-vs-complex">Read more</a>
                </div>
                <div class="p-3 mb-3  ">
                    <h3>Measuring costs</h3>
                    <p>I measure the market cost of a developer, the time a developer takes to complete a change and the competition of user choice.</p>
                    <p class="text-secondary">Coming soon</p>
                </div>
                <div class="p-3 mb-3  ">
                    <h3>Natural software partitions</h3>
                    <p>The most basic partition is a memory bit being on or off.</p>
                    <p class="text-secondary">Coming soon</p>
                </div>
                <div class="p-3 mb-3  ">
                    <h3>Counting connections between parts</h3>
                    <p>In one sense, the census is simple. They record the marital status of hundreds of millions of people but not who is married to each other.</p>
                    <p class="text-secondary">Coming soon</p>
                </div>
                <div class="p-3 mb-3  ">
                    <h3>Connection variety</h3>
                    <p>Programming languages define the allowed operations between variables. Joining text together. Addition. Subtraction. Etc.</p>
                    <p>Higher level measurements capture the relationships between programmer-developed data types. Does joining two humans ever result in three?</p>
                    <p class="text-secondary">Coming soon</p>
                </div>
                <div class="p-3 mb-3  ">
                    <h3>A real project</h3>
                    <p>My day job is helping maintain an online API for ordering graphic T-shirts.</p>
                    <p class="text-secondary">Coming soon</p>
                </div>
                <div class="p-3 mb-3  ">
                    <h3>The hypothesis</h3>
                    <p>There are observable correlations between the measures of complexity and my chosen cost measures.</p>
                    <p class="text-secondary">Coming soon</p>
                </div>
                <!--
                <div class="p-3 mb-3">
                    <p class="text-secondary mb-0">01/07/23</p>
                    <h3><a href="{{ route('shipment') }}">Shipping shirts slowly, then faster, with a unique frontend</a></h3>
                </div>
                <div class="p-3 mb-3">
                    <p class="text-secondary mb-0">01/24/23</p>
                    <h3><a href="{{ route('media.index') }}">Searching for broken art, in the right place, with Laravel Request Validation</a></h3>
                </div>
                <div class="p-3 mb-3">
                    <p class="text-secondary mb-0">02/22/23</p>
                    <h3><a href="{{ route('media.bulk.edit') }}">Repeating the previous step hundreds of times, all at once, in queues</a></h3>
                </div>
                <div class="p-3 mb-3">
                    <p class="text-secondary mb-0">04/04/23</p>
                    <h3><a href="{{ route('deployment') }}">Crashing this site less on Docker, Heroku & Git</a></h3>
                </div>
            -->
            </div>
        </div>
    </div>
@endsection