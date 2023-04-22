@extends('media/tabs')

@section('display')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit existing media</h3>
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
            <form method="POST" action="{{ route('media.update', array_merge(['media' => $media], Request::query())) }}#tabs">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="originalUrl">URL</label>
                    <input id="originalUrl" class="form-control form-control-sm rounded-0" name="original_url" type="text" value="{{ $media->original_url }}">
                    <div class="form-text" id="originalUrlHelp">This will replace the media for work orders that currently use this media</div>
                </div>
                <div class="mb-3">
                    <input class="btn btn-success btn-sm rounded-0" type="submit"/>
                </div>
                <p><a href="{{ route('media.index', Request::query()) }}#tabs">Cancel</a></p>
            </form>

        </div>
    </div>
@endsection
