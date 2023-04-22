@extends('base')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 border p-5 mt-5">
                <div class="">
                    {{ $slot }}
                </div>

            </div>
        </div>

    </div>
@endsection
