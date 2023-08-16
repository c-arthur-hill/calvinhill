@extends('base')

@section('head')
    <title>Calvin Hill software development articles - Save money, accelerate development and increase productivity</title>
    <meta name="description" content="Calvin Hill software development company articles - Save money, accelerate development and increase productivity">
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
            <div class="col-lg-5">
                <div class="p-3">
                    <h1>Simple vs complex software</h1>
                    <img src="https://images.metmuseum.org/CRDImages/as/original/DP-23307-001.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3">
                    <h3>Complexity</h3>
                    <p>Complexity is the quality of having many and varied interactions between the parts of a whole.</p>
                    <h3>User complexity</h3>
                    <p>I think the study of users' view of software complexity falls under the label user experience research. This questions how users accomplish their tasks using the forms and screens provided by software.</p>
                    <h3>Developer complexity</h3>
                    <p>Sometimes, a change which seems simple to a user is very difficult for a developer to implement.</p>
                    <p>In university, my assignments were always writing software from scratch. I don't believe I ever fixed bugs in a complex existing code base.</p>
                    <p>University assignments were more algorithmically and conceptually abstract than my day-to-day work.</p>
                    <p>But my day-to-day work is <strong>more complex</strong> than university assignments. It builds off code twisted to the arbitrary nature of reality by people of differing abilities and approaches.</p>
                    <h3>Simple software</h3>
                    <p>Software originates out of hardware. A position in memory could be on or off.</p>
                    <p>In my opinion, the two simplest software programs either keep the position in memory the same or toggle to the opposite.</p>
                    <h3>Can the complexity of software be <i>meaningfully</i> measured?</h3>
                    <p>There's no theoretical limit on how complex software can become. I can always jam more useless parts in.</p>
                    <p>The <i>costs</i> of different software that accomplishes the same end can be measured and compared. Algorithm designers already predict which method takes a CPU longer to sort a list.</p>
                    <p>But these designers aren't interested in the human costs of implementing and maintaining the different approaches. The purpose of these articles is to:</p>
                    <ol>
                        <li>Identify natural software partitions</li>
                        <li>Count the connections between parts</li>
                        <li>Measure the variety of connections</li>
                        <li>Identify measures that correlate to software costs, development delays and poor user productivity (as tested by observed user performance)</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

