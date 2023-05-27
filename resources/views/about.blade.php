@extends("base")

@section('body')
    <div class="row mt-5">
        <div class="col-lg-5 mx-auto mb-5">
            <h3>Professional</h3>
            <p>I started as a network analyst at Presidio Networked Solutions. Then I was a web developer for Seminole State College and Florida State University.</p>
            <p>I've done contract work building software to fulfill orders for the apparel industry and calculate sales commissions for a major retail brand.</p>
            <div class="mb-5 row g-0">
                <div class="col-lg-6">
                    <div style="overflow: hidden;" class="">
                        <img class="img-fluid" src="{{ Storage::disk('s3')->url('img/right.JPG') }}">
                    </div>
                </div>
        </div>
    </div>
@endsection
