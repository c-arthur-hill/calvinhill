@extends('media/tabs')

@section('display')

    <div class="row">
        <div class="col-lg-12">
            <h3>Create new media</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">


            @if ($errors->any())
                <div class="alert alert-danger border-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('media.store', Request::query()) }}#tabs">
                @csrf
                <div class="mb-3">
                    <label for="originalUrl">Media URL</label>
                    <input id="originalUrl" class="form-control form-control-sm rounded-0" name="original_url" type="text" placeholder="https://example.com/media.png">
                    <div class="form-text" id="originalUrlHelp">The url of the art to download</div>
                </div>
                <div class="mb-3">
                    <input class="btn btn-success btn-sm rounded-0" type="submit"/>
                </div>
                <p><a href="{{ route('media.index', Request::query()) }}#tabs">Cancel</a></p>
            </form>
        </div>
    </div>
@endsectioN