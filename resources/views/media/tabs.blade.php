@extends('base')

@section('body')
<div class="container">
    <div class="row" id="tabs">
        <div class="col-lg-10 offset-lg-1 ">
            <nav class="mt-5">
                <ul class="nav nav-tabs" id="nav-tab">
                    <li class="nav-item" role="presentation">
                        @if (request()->route()->getName() == 'media.index' )
                            <a class="nav-link bg-light rounded-0 border-top border-start border-end text-dark"  href="{{ route('media.index', Request::query()) }}#tabs">List</a>
                        @else
                            <a class="nav-link"  href="{{ route('media.index', Request::query()) }}#tabs">List</a>
                        @endif
                    </li>
                    <li class="nav-item" role="presentation">
                        @if (request()->route()->getName() == 'media.create' )
                            <a class="nav-link bg-light rounded-0 border-top border-start border-end text-dark"  href="{{ route('media.create', Request::query()) }}#tabs">Create</a>
                        @else
                            <a class="nav-link"  href="{{ route('media.create', Request::query()) }}#tabs">Create</a>
                        @endif
                    </li>
                    @if (request()->route()->getName() == 'media.edit' )
                        <li class="nav-item" role="presentation">
                            <a class="nav-link bg-light rounded-0 border-top border-start border-end text-dark"  href="{{ route('media.edit', array_merge(['media' => $media], Request::query())) }}#tabs">Edit</a>
                        </li>
                    @endif
                    @if (request()->route()->getName() == 'media.delete' )
                        <li class="nav-item" role="presentation">
                            <a class="nav-link bg-light rounded-0 border-top border-start border-end text-dark"  href="{{ route('media.destroy', array_merge(['media' => $media], Request::query())) }}#tabs">Delete</a>
                        </li>
                    @endif

                </ul>
            </nav>
            <div class="border-start border-end border-bottom p-5 bg-light" >
                @yield('display')
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-5 mx-auto mb-5">
            <h3>Searching for broken art</h3>
            <p>I had another task for the apparel printer. One of their managers is responsible for ensuring the pictures and illustrations submitted to the API aren't broken. The files can't be corrupted. They can't have weird marks or cropping issues.</p>
            <p>Sometimes he'll find a mistake he can fix. He wanted to be able to download it, fix in Photoshop and replace it.</p>
            <p>He needed a system to find the art with a problem.</p>
            <h3>In the right place</h3>
            <p>I created filters on the date. Often he had an idea of when it was submitted.</p>
            <p>He can search by urls as well. They support a partial match. Customers can submit art by specifying the hosting url. This gives him the power to filter by either the host or part of the file name.</p>
            <p>Above, I limited to three rows per page. In the real system, there are more. The pagination controls are on the bottom.</p>
            <p>He can re-download art from the original source. This is especially useful if the customer has updated it.</p>
            <p>You see he can create, edit and delete media with the buttons.</p>
            <p class="mt-5 mb-5 clearfix">
                <span class="float-start">
                    <a href="{{ route('shipment') }}" class="">Previous<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                </span>
                <span class="float-end">
                    <a href="{{ route('media.bulk.edit') }}" class="">Next<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                </span>
            </p>
            <h3 class="">With CRUD</h3>
            <p>I think few people understand what professional software developers do.</p>
            <p>CRUD (create-read-update-delete) functionality is the bread-and-butter.</p>
            <p>Most web applications are built around a database with tables to store information about different classes of objects.</p>
            <p>Facebook has users, posts, likes, shares and friends. Accounting software has accounts, line items, etc.</p>
            <p>CRUD is a shorthand for the lists and forms used to manage. Good developers pay attention to the common tasks perform on them. They taylor the tools to them.</p>
            <p>Tabs have great usability. They show which page the user is currently looking at. They show the available options. They are widely understood.</p>
            <p>"Read" sometimes refers to viewing information about a single item. These aren't hard lines. Here I'd use it to refer to the Media List page.</p>
            <p>Commercial software puts a lot of work into designing filters and sorting on lists of data. Here, there's a start and end date. They would be entered in the user's timezone, but often database stores time in UTC to be timezone independent.</p>
            <p>Fuzzy searching many terms is often very slow. The approach I used in line 41 of the MediaController would not scale. But it works here.</p>
            <p>Pagination is another basic expectation in most commercial software. User's don't want to wait for thousands of images to load on a page.</p>
            <p>Laravel is behind other frameworks on forms. I can validate the input coming in on requests. But in other frameworks, I can reuse a common class across controllers and output it simply in the template. Symfony does this well. </p>
        </div>
    </div>
</div>

@endsection


