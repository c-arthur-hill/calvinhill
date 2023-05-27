@extends('base')

@section('body')
    <div class="row mt-5">
        <div class="col-lg-5 mx-auto mb-5">
            <div class="mb-5">
                <p class="text-secondary mb-0">01/07/23</p>
                <h3><a href="{{ route('shipment') }}">Shipping shirts slowly, then faster, with a unique frontend</a></h3>
            </div>
            <div class="mb-5">
                <p class="text-secondary mb-0">01/24/23</p>
                <h3><a href="{{ route('media.index') }}">Searching for broken art, in the right place, with Laravel Request Validation</a></h3>
            </div>
            <div class="mb-5">
                <p class="text-secondary mb-0">02/22/23</p>
                <h3><a href="{{ route('media.bulk.edit') }}">Repeating the previous step hundreds of times, all at once, in queues</a></h3>
            </div>
            <div class="mb-5">
                <p class="text-secondary mb-0">04/04/23</p>
                <h3><a href="{{ route('deployment') }}">Crashing this site less on Docker, Heroku & Git</a></h3>
            </div>
        </div>
    </div>
@endsection