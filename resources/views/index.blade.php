@extends("base")

@section('body')
<div class="container">
    <div class="row g-0">
        <div class="col-md-5 offset-md-1">
            <div class="pe-5 pt-5">
                <img class="img-fluid shadow border" src="{{ asset('/img/screen2.png') }}">
            </div>
        </div>
        <div class="col-md-5">
            <div class="p-5">
                <p><!-- I work under a senior developer, Cory. He reviews my code. I make corrections. -->The only way to become a senior developer was to build real software.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row g-0">
        <div class="col-md-5 offset-md-1">
            <div class="pe-5 pt-5 pb-5">

                <video loop="" controls="" class="img-fluid shadow border" src="{{ asset('/img/dtg.mp4') }}"/>

            </div>
        </div>
        <div class="col-md-5">
            <div class="p-5">
                <h3 class="">Building real software</h3>
            </div>
        </div>
    </div>
</div>
@endsection
