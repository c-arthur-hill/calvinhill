@extends('base')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-1 d-none d-lg-block">
                <div class="pt-3 pb-3 mt-5">
                    <img class="img-fluid rounded-circle" src="{{ Storage::disk('s3')->url('img/right_square.JPG') }}">

                </div>
            </div>
            <div class="col-lg-5">
                <div class="p-3">
                    <h1 class="display-4"></h1>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3 mb-3  ">
                    <h3></h3>
                    <p></p>
                    <h3></h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
@endsection
