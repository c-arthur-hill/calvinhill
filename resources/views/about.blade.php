@extends("base")

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-5 offset-lg-4 mb-5">
                <h3>Professional</h3>
                <p>I started as a network analyst at Presidio Networked Solutions. Then I was a web developer for Seminole State College and Florida State University.</p>
                <p>I've done contract work building software to fulfill orders for the apparel industry and calculate sales commissions for a major retail brand.</p>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 offset-lg-4 mb-5">
                <div style="overflow: hidden;" class="">
                    <img class="img-fluid" src="{{ Storage::disk('s3')->url('img/right.JPG') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
