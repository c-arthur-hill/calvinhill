@extends("base")

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-5 offset-lg-4 mb-5">
                <h3>Professional</h3>
                <p>My first tech job was troubleshooting corporate networks for Presidio Networked Solutions.</p>
                <p>I worked at Seminole State College and Florida State University as a web application developer.</p>
                <p>I started contracting with a private agency in Clearwater, FL. I helped build online fulfillment software for the apparel industry. I also led development of a portal for calculating sales commissions.</p>
                <h3>Personal</h3>
                <p>I drive a Corolla. I workout with kettlebells and eat oatmeal.</p>
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
