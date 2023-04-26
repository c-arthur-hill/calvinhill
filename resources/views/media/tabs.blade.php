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
        <div class="col-lg-5 mx-auto">
            <h3>Searching for broken art</h3>
            <p>I had another task for the apparel printer. One of their managers is responsible for ensuring the pictures and illustrations submitted to the API aren't broken. The files can't be corrupted. They can't have weird marks or cropping issues.</p>
            <p>Sometimes he'll find a mistake he can fix. He wanted to be able to download it, fix in Photoshop and replace it.</p>
            <p>He needed a system to find the art with a problem.</p>
            <h3>In the right place</h3>
            <p>I created filters on the date. Often he had an idea of when it was submitted.</p>
            <p>He can search by urls as well. They support a partial match. Customers can submit art by specifying the hosting url. This gives him the power to filter by either the host or part of the file name.</p>
            <p>Above, I limited to three rows per page. In the real system, there are more. The pagination controls are on the bottom.</p>
            <p>He can re-download art from the original source. This is especially useful if the customer has updated it.</p>
            <p>He can create, edit and delete media with the buttons.</p>
            <p class="mt-5 mb-5 clearfix">
                <span class="float-start">
                    <a href="{{ route('shipment') }}" class="">Previous<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                </span>
                <span class="float-end">
                    <a href="{{ route('media.bulk.edit') }}" class="">Next<!--<span class="ms-2"><i class="bi bi-arrow-right-circle"></i></span>--></a>
                </span>
            </p>
            <h3 class="">With Laravel Request Validation</h3>
            <p>These routes are different than the previous. They use Resource controllers.</p>
            <p>Changing data is blocked.</p>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 ">


            <div class="card rounded-0 mb-3"> <div class="card-header">
                    <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/routes/web.php">/routes/web.php</a>
                </div>
                <div class="card-body">
<pre ><code><span class="text-secondary">  39</span>  Route::<mark>Resource</mark>('media', MediaController::class)
<span class="text-secondary">  40</span>        ->parameters(['media' => 'media'])
<span class="text-secondary">  41</span>        ->only(['store', 'update', 'destroy'])
<span class="text-secondary">  42</span>        <mark>->middleware(['auth', 'verified']);</mark>
<span class="text-secondary">  43</span>
<span class="text-secondary">  44</span>  Route::Resource('media', MediaController::class)
<span class="text-secondary">  45</span>        ->parameters(['media' => 'media'])
<span class="text-secondary">  46</span>        ->only(['index', 'create', 'edit', 'delete']);</code></pre>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <p>The SearchMediaRequest validates the search form. This is a simple case. It verifies the dates.</p>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card rounded-0 mb-3">
                <div class="card-header">
                    <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/app/Http/Requests/SearchMediaRequest.php">/app/Http/Requests/SearchMediaRequest.php</a>
                </div>
                <div class="card-body">
<pre ><code><span class="text-seconddary">   1</span>  &lt;?php
<span class="text-secondary">   2</span>
<span class="text-secondary">   3</span>  namespace App\Http\Requests;
<span class="text-secondary">   4</span>  use Illuminate\Foundation\Http\FormRequest;
<span class="text-secondary">   5</span>
<span class="text-secondary">   6</span>  class SearchMediaRequest extends FormRequest
<span class="text-secondary">   7</span>  {
<span class="text-secondary">   8</span>      public function rules(): array
<span class="text-secondary">   9</span>      {
<span class="text-secondary">  10</span>          return [
<span class="text-secondary">  11</span>              <mark>'start' => 'nullable|date',</mark>
<span class="text-secondary">  12</span>              <mark>'end' => 'nullable|date',</mark>
<span class="text-secondary">  13</span>              <mark>'search' => 'nullable'</mark>
<span class="text-secondary">  14</span>          ];
<span class="text-secondary">  15</span>      }
<span class="text-secondary">  16</span>  }</code></pre>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">

                <p>The controller processes the validated data from the request to query for matching items.</p>
                <p>Using many "or likes" is slow. I don't have enough rows in the database to matter.</p>
                <p>The query string and fragment are appended to each pagination link. Users navigate the forms without losing their search results.</p>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/app/Http/Controllers/MediaController.php">/app/Http/Controllers/MediaController.php</a>
                    </div>
                    <div class="card-body">
<pre ><code><span class="text-secondary">  19</span>  public function index(<mark>SearchMediaRequest</mark> $request): View
<span class="text-secondary">  20</span>  {
<span class="text-secondary">  21</span>      $validated = $request->validated();
<span class="text-secondary">  22</span>
<span class="text-secondary">  23</span>      $start = $validated['start'] ?? '';
<span class="text-secondary">  24</span>      $end = $validated['end'] ?? '';
<span class="text-secondary">  25</span>      $searchTerms = [];
<span class="text-secondary">  26</span>      if ($validated['search'] ?? null) {
<span class="text-secondary">  27</span>          foreach(explode(',', $validated['search']) as $part) {
<span class="text-secondary">  28</span>              $searchTerms[] = trim($part);
<span class="text-secondary">  29</span>          }
<span class="text-secondary">  30</span>      }
<span class="text-secondary">  31</span>
<span class="text-secondary">  32</span>      $medias = DB::table('medias')
<span class="text-secondary">  33</span>          ->when($start, function($q) use ($start) {
<span class="text-secondary">  34</span>              return $q->where('downloaded_at', '>=' ,date_create_from_format('Y-m-d', $start)->setTimezone(new \DateTimeZone('UTC')));
<span class="text-secondary">  35</span>          })
<span class="text-secondary">  36</span>          ->when($end, function($q) use ($end) {
<span class="text-secondary">  37</span>              return $q->where('downloaded_at', '<=', date_create_from_format('Y-m-d', $end)->setTimezone(new \DateTimeZone('UTC')));
<span class="text-secondary">  38</span>          })
<span class="text-secondary">  39</span>          ->when($searchTerms, function($q) use ($searchTerms) {
<span class="text-secondary">  40</span>              $q->where(function($qq) use ($searchTerms) {
<span class="text-secondary">  41</span>                  <mark>foreach($searchTerms as $searchTerm) {</mark>
<span class="text-secondary">  42</span>                      // https://stackoverflow.com/questions/70397448/how-to-use-laravel-8-query-builder-like-eloquent-for-searching
<span class="text-secondary">  43</span>                      <mark>$qq->orWhere('original_url', 'like', '%' . $searchTerm . '%');</mark>
<span class="text-secondary">  44</span>                  }
<span class="text-secondary">  45</span>              });
<span class="text-secondary">  46</span>              return $q;
<span class="text-secondary">  47</span>          })
<span class="text-secondary">  48</span>          ->whereNull('deleted_at')
<span class="text-secondary">  49</span>          <mark>->paginate(3)->fragment('tabs')->withQueryString();</mark>
<span class="text-secondary">  50</span>      return view('media.index', [
<span class="text-secondary">  51</span>          'start' => $start,
<span class="text-secondary">  52</span>          'end' => $end,
<span class="text-secondary">  53</span>          'searchTerms' => $searchTerms,
<span class="text-secondary">  54</span>          'medias' => $medias,
<span class="text-secondary">  55</span>      ]);
<span class="text-secondary">  56</span>  }</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <p>Laravel redirects back to the submitting page after invalid form submissions. The "old" helper sets the form input to what was submitted. Users see errors in the context of what they entered.</p>
                <p>The "GET" form method puts the search parameters in the querystring, similar to the controller above.</p>
            </div>

        </div>
    <div class="row" id="tabs">
        <div class="col-lg-10 offset-lg-1 ">

                    <div class="card rounded-0 mb-3"> <div class="card-header">
                            <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/resources/views/index.blade.php">/resources/views/index.blade.php</a>
                        </div>
                        <div class="card-body">
@verbatim
<pre ><code><span class="text-secondary">  39</span>  &lt;form <mark>method="GET"</mark> class="">
<span class="text-secondary">  40</span>      &lt;div class="mb-3">
<span class="text-secondary">  41</span>          &lt;label for="start">Start date&lt;/label>
<span class="text-secondary">  42</span>          &lt;input name="start" class="form-control form-control-sm rounded-0" type="date" <mark>value="{{ old('start') }}"</mark>/>
<span class="text-secondary">  43</span>      &lt;/div>
<span class="text-secondary">  44</span>      &lt;div class="mb-3">
<span class="text-secondary">  45</span>          &lt;label for="end">End date&lt;/label>
<span class="text-secondary">  46</span>          &lt;input name="end" class="form-control form-control-sm rounded-0" type="date" <mark>value="{{ old('end') }}"</mark> />
<span class="text-secondary">  47</span>      &lt;/div>
<span class="text-secondary">  48</span>      &lt;div class="mb-3">
<span class="text-secondary">  49</span>          &lt;label for="search">Search urls&lt;/label>
<span class="text-secondary">  50</span>          &lt;textarea id="search" name="search" class="form-control form-control-sm rounded-0" placeholder="example,example2,example3,"><mark>{{ old('search') }}</mark>&lt;/textarea>
<span class="text-secondary">  51</span>          &lt;div class="form-text" id="searchHelp">Ex. "ample" returns images from "example.com/image1.png" and "asdf.com/example.png"&lt;/div>
<span class="text-secondary">  52</span>      &lt;/div>
<span class="text-secondary">  53</span>      &lt;button type="submit" class="btn btn-success btn-sm rounded-0">Filter&lt;/button>
<span class="text-secondary">  54</span>  &lt;/form></code></pre>@endverbatim
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection


