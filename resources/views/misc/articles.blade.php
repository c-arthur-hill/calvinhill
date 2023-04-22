@extends('base')

@section('body')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5 mx-auto mb-5">
                <div class="mb-5">
                    <h3>Shipping shirts slowly, then faster, with a unique frontend</h3>
                    <p><a href="{{ url('shipment.create') }}">Link</a></p>
                </div>
                <div class="mb-5">
                    <h3>Searching for broken art, in the right place, with CRUD</h3>
                    <p><a href="{{ url('media.list') }}">Link</a></p>
                </div>
                <div class="mb-5">
                    <h3>Repeating the previous step hundreds of times, all at once, in queues</h3>
                    <p><a href="{{ url('media.bulk.edit') }}">Link</a></p>
                </div>
                <div class="mb-5">
                    <h3>Crashing this site less on Docker, Heroku & Git</h3>
                    <p><a href="{{ url('deployment') }}">Link</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection