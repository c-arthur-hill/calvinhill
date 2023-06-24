@extends("base")

@section('body')
<div class="container mt-5">
    <div class="row g-0">
        <div class="col-lg-10 offset-lg-1">
            <div class="shadow" style="background-image: url({{ Storage::disk('s3')->url('img/white.png') }});">
                <div class="row">
                    <div  class="col-lg-8 p-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="display-4">Software application development</h1>
                                <p class="text-secondary mt-3"><i>Organized. Professional. Experienced.</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <form class="p-3 bg-light border h-100" method="POST" action="{{ route('contact.update') }}">
                            <h3>Request services</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger border-danger rounded-0">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-floating">
                                <input autofocus="autofocus" value="{{ old('email') }}" id="email" type="email" name="email" class="form-control rounded-0">
                                <label for="email" class="">Email*</label>
                            </div>
                            <div class="form-floating mt-3">
                                <input  value="{{ old('name') }}" id="name" type="text" class="form-control rounded-0" name="name">
                                <label for="name" class="">Name*</label>
                            </div>
                            <div class="form-floating mt-3">
                                <textarea id="description" name="description" class="form-control rounded-0"> {{ old('description') }} </textarea>
                                <label for="description" class="">Project description*</label>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-danger rounded-0">Request services</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                <div class="col-lg-4">
                    <div style="overflow: hidden;" class="">
                        <img class="img-fluid" src="{{ Storage::disk('s3')->url('img/right.JPG') }}">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <h5 class="mt-5 mt-lg-0">Services</h5>
                    <p><mark>I develop custom software applications.</mark></p>
                    <p>I gather the requirements. I design the interface and create a step-by-step plan. I write the code. I deploy the servers. I fix what breaks.</p>
                    <div class="mt-5 mb-5">
                        <p class="text-secondary">Tallahassee, FL, USA<br>calvin@calvinhill.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
