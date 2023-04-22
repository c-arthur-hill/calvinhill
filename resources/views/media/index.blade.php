@extends('media/tabs')
@section('display')
    <div class="row">
        <div class="col-lg-12">
            <h3>Media list</h3>
        </div>

    </div>
    <div class="row">
        <div class="bg-light col-lg-3 border-bottom">
            <div class="p-3">
                <h6 class="text-secondary">Filter</h6>
            </div>
        </div>
        <div class="bg-light d-none d-lg-grid col-lg-9 border-bottom">
            <div class="row">
                <div class="col-lg-2">
                    <div class="p-3">
                        <h6 class="text-secondary">#</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-3">
                        <h6 class="text-secondary">Thumbnail</h6>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="p-3">
                        <h6 class="text-secondary">Original</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row border-bottom">
        <div class="col-lg-3 bg-light border-start border-bottom border-end">
            <div class="p-3">
                <form method="GET" class="">
                    <div class="mb-3">
                        <label for="start">Start date</label>
                        <input name="start" class="form-control form-control-sm rounded-0" type="date" value="{{ $start }}"/>

                    </div>
                    <div class="mb-3">
                        <label for="end">End date</label>
                        <input name="end" class="form-control form-control-sm rounded-0" type="date" value="{{ $end }}" />
                    </div>
                    <div class="mb-3">
                        <label for="search">Search urls</label>
                        <textarea id="search" name="search" class="form-control form-control-sm rounded-0" placeholder="example,&#10;example2,&#10;example3,">{{ join(',' . PHP_EOL, $searchTerms) }}</textarea>
                        <div class="form-text" id="searchHelp">Ex. "ample" returns images from "example.com/image1.png" and "asdf.com/example.png"</div>
                    </div>
                    <div class="mb-3">

                    </div>
                    <button type="submit" class="btn btn-success btn-sm rounded-0">Filter</button>


                </form>
            </div>
        </div>
        <div class="col-lg-9 border-end border-start">
            @foreach($medias as $media)
                <div class="row border-bottom">
                    <div class="col-lg-2">
                        <div class="p-3">
                            {{ $media->id }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-3">
                            @if ($media->thumbnail)
                                <img src="{{ Storage::disk('s3')->url($media->thumbnail) }}" class="img-fluid">
                            @else
                                <p>No thumbnail</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="p-3">
                            <a class="" target="_blank" href="{{ $media->original_url }}">Link</a>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="p-3">
                            <a href="{{ route('media.edit', array_merge(['media' => $media->id], Request::query())) }}#tabs" class="btn btn-sm btn-primary rounded-0">Edit</a>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="p-3">
                            <form method="POST" action="{{ route('media.destroy', array_merge(['media' => $media->id], Request::query())) }}">
                                @method('delete')
                                @csrf
                                <input type="submit" class="btn btn-sm btn-danger rounded-0" value="Delete" />
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    <div class="row mt-3">
        <div class="offset-lg-3 col-lg-9">
            {{ $medias->onEachSide(1)->links(null, ['class' => 'rounded-0']) }}
        </div>
    </div>

@endsection

