@extends('base')
@section('body')
    <div class="container">
        <div class="row">
           <div class="col-lg-6 offset-lg-1 border bg-light p-5 mt-5">
               <h3 class="mb-3">{{ $title }}</h3>
               <div class="">
                   {{ $slot }}
               </div>

           </div>
        </div>

    </div>
@endsection
