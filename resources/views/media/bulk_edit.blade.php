@extends('base')

@section('body')
<div class="container">

    <div class="row mt-5">
        <div class="col-lg-10 offset-lg-1 border bg-light p-5">
            <h3 class="">Bulk Media Upload</h3>
            @if ($errors->any())
                <div class="alert alert-danger border-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" enctype="multipart/form-data" action="{{ url(route('media.bulk.update')) }}">
                @csrf
                <div class="mb-3">
                    <label for="medias">CSV File</label>
                    <input id="medias" name="medias" class="form-control form-control-sm rounded-0" type="file">
                    <div class="form-text" id="mediasHelp">Any rows uploaded in this file will replace existing media</div>
                    <a class="" download href="{{ url(route('media.bulk.download')) }}">Download current medias in correct format</a>
                </div>
                <input type="submit" class="btn btn-sm btn-success rounded-0">
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-5 mx-auto mb-5">
            <h3>Repeating the previous step, hundreds of times</h3>
            <p>The employee using the station in the previous step had hundreds of broken files. A customer submitted logos and the background color wasn't printing correctly.</p>
            <p>He had contacted the customer. They fixed the background.</p>
            <h3>All at once</h3>
            <p>He didn't want to manually click through whenever this happened.</p>
            <p>I built this download / upload csv (comma separated values)  form to correct them "in bulk".</p>
            <p>He downloads the existing medias. He opens that in Excel. He finds and replaces the effected URLs.</p>
            <p>When he re-uploads the modified CSV file, the altered rows will be updated to use the new art.</p>
            <p class="mt-5 mb-5 clearfix">
                <span class="float-start">
                    <a href="{{ route('media.index') }}" class="">Previous<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                </span>
                <span class="float-end">
                    <a href="{{ route('deployment') }}" class="">Next<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                </span>
            </p>
            <h3 class="">In Queues</h3>
            <p>The normal cycle for a web request is the user clicks something in their browser, it sends the request to my server and the server sends a response.</p>
            <p>On this page, the server could have to download hundreds of images from different sites then run a script to generate a thumbnail for each. The user won't wait for that.</p>
            <p>Instead, the server reads each row in the file, creates a list of jobs to perform for each and sends the response.</p>
            <p>These jobs are sent to Redis. Redis is a piece of software that takes a list of software tasks to perform, and steadily performs them one after another.</p>
            <p>When a user replaces media urls through the form on this page, each new media url creates two jobs. One will find the media row in the database update it's url. The second will download a copy of image to reduce our dependency on customer's hosting and generate the thumbnail.</p>
            <p>Something I like about Laravel is I can define types of jobs and dispatch them from different places.</p>
            <p>For example, I seeded my media table on the last page with 40+ images from the Met museum public domain website. I:</p>
            <ol>
                <li>Downloaded the pictures I wanted to use.</li>
                <li>Upload the original photo to an S3 bucket. S3 is a service Amazon offers. It's like Windows File Explorer, but it's an online service. So as a developer, I can take an image that a user uploads and stash it in a safe (cheap) place.</li>
                <li>Ran a script to create an entry in my media database table for each image in the S3 bucket. This created entries in the "medias" table of my database that had a url that should be downloaded, but no local copy or thumbnail. </li>
                <li>Ran a second script to create the second type of job from above. I was able to re-use that same job. So each of these medias downloaded a local copy (actually copying from myself to avoid hitting the Met museum free servers too hard) and generated a thumbnail.</li>
                <li>So the end result is a database table called medias. It has three columns. The original url, which is usually something like metmuseum.com/davinci.png but I had already stored that file at https://amazonaws.s3.com/calvinhillbucket/originals/davinci.png. Then the downloaded url, like https://amazonaws.s3.com/calvinhillbucket/downloads/davinci.png. Then the thumbnail, https://maazonaws.s3.com/calvinhillbucket.com/thumbnails/davinci.png.</li>
            </ol>
        </div>
    </div>
</div>

@endsection