@extends('base')

@section('head')
    <title>Calvin Hill Software Development Company Questions</title>
    <meta name="description" content="What to know before hiring a software development company">
    <meta name="keywords" content="Software, Development, Application, Custom, Bespoke, Developers, Outsourcing, App, Dev, Articles">
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-1 d-none d-lg-block">
                <div class="pt-3 pb-3">
                    <img class="img-fluid rounded-circle" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3">
                    <h1 class="display-4 mb-5">Software development questions</h1>
                    <h5 class=""><mark>Beginner</mark></h5>
                    <div class="   ">
                        <h3>What does a software developer do?</h3>
                        <p>Businesses organize work into processes.</p>
                        <p>Software developers research how a business organizes these processes. They identify waste and inefficiency. They develop software applications to remove them.</p>
                        <!--<p><a href="">Read more</a></p>-->
                    </div>
                    <div class="   ">
                        <h3>Why is custom software development better?</h3>
                        <p>It's not. Custom software is the last resort when existing solutions don't fit.</p>
                        <p>It takes longer and costs more than off-the-shelf software.</p>
                        <!--<p><a href="">Read more</a></p>-->
                    </div>
                    <div class="   ">
                        <h3>Why is custom software development so expensive?</h3>
                        <p>It takes intelligent and hardworking people a long time to get right.</p>
                        <p>The way to save money is hiring cheaper developers or finishing the project faster.</p>
                        <!--<p><a href="">Read more</a></p>-->
                    </div>
                    <div class="   ">
                        <h3>How do I find a custom software development company?</h3>
                        <p>Comparison shop.</p>
                        <p>The problem is any developer can promise rapid development at budget prices. Not all deliver.</p>
                        <!--<p><a href="">Read more</a></p>-->
                    </div>
                    <div class="   ">
                        <h3>Which is the best custom software development company?</h3>
                        <p>The best custom software development companies manage the root problem of software complexity.</p>
                        <!-- <p>I develop a free software library for measuring and communicating complexity metrics to business people.</p> -->
                        <!--<p>Here's what to ask for:</p>-->
                        <!--<p><a href="">Read more</a></p>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <h5><mark>Technical</mark></h5>
                <div class="   ">
                    <h3><!-- 11 -->Techniques to reduce software complexity as a (PHP) developer</h3>
                    <p>I develop simple software faster than complex software.</p>
                    <p>The only techniques that significantly increased my long-term productivity were those that reduced the complexity of the software I was working on.</p>
                    <!--<p><a href="">Read more</a></p>-->
                </div>
                <div class="   ">
                    <h3>What is software complexity?</h3>
                    <p>Complexity is the quality of having many and varied interactions between the parts of a whole.</p>
                    <!--<p><a href="">Read more</a></p>-->
                </div>
                <div class="   ">
                    <h3><!--8 -->1.) Software partitions</h3>
                    <p>The first step in reducing complexity is separating software into parts.</p>
                    <p>At the lowest level, software is a series of memory bits that are on or off.</p>
                </div>
                <div class="   ">
                    <h3><!-- 15 -->2.) Software partition connections</h3>
                    <p>A computer performs operations to change which bits are on or off.</p>
                    <p>The CPU instruction set defines the starting set of logical operations.</p>
                </div>
                <div class="   ">
                    <h3><!-- 23 -->3.) Software partition connection varieties</h3>
                    <p>Software developers combine the basic logical operations a computer can perform into more complex abstractions.</p>
                </div>
                <div class="   ">
                    <h3><!--7 -->Software complexity metrics</h3>
                    <p>I want a single metric to measure the total complexity of a codebase, and sub-metrics to find problem areas.</p>
                </div>
                <div class="">
                    <h3>Measuring software costs</h3>
                    <p>The final measurement is money. It's useful to account for where the budget was spent and reduce the biggest buckets.</p>
                </div>
                <!--
                <div>
                    <h3><strong>DrownProofing</strong>: A PHP library for programmatically measuring software complexity</h3>
                    <p>I want to fix complexity regressions as routinely as fixing test suite regressions.</p>
                </div>
                <div class="   ">
                    <h3>Correlating software costs with complexity</h3>
                    <p>Here are the graphs:</p>
                </div>
                -->
            </div>
        </div>
    </div>
@endsection