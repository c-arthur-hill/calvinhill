<?php

namespace App\Http\Controllers;

use App\Jobs\DownloadMedia;
use App\Jobs\GenerateThumbnail;
use App\Jobs\UpdateMediaOriginalUrl;
use App\Models\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(Request $request): View
    {
        $validated = $request->validate([
            'start' => 'nullable|date',
            'end' => 'nullable|date',
            'search' => 'nullable'
        ]);

        $start = $validated['start'] ?? '';
        $end = $validated['end'] ?? '';
        $searchTerms = [];
        if ($validated['search'] ?? null) {
            foreach(explode(',', $validated['search']) as $part) {
                $searchTerms[] = trim($part);
            }
        }

        $medias = DB::table('medias')
            ->when($start, function($q) use ($start) {
                return $q->where('downloaded_at', '>=' ,date_create_from_format('Y-m-d', $start)->setTimezone(new \DateTimeZone('UTC')));
            })
            ->when($end, function($q) use ($end) {
                return $q->where('downloaded_at', '<=', date_create_from_format('Y-m-d', $end)->setTimezone(new \DateTimeZone('UTC')));
            })
            ->when($searchTerms, function($q) use ($searchTerms) {
                $q->where(function($qq) use ($searchTerms) {
                    foreach($searchTerms as $searchTerm) {
                        // https://stackoverflow.com/questions/70397448/how-to-use-laravel-8-query-builder-like-eloquent-for-searching
                        $qq->orWhere('original_url', 'like', '%' . $searchTerm . '%');
                    }
                });
                return $q;
            })
            ->whereNull('deleted_at')
            ->paginate(3)->fragment('tabs')->withQueryString();
        return view('media.index', [
            'start' => $start,
            'end' => $end,
            'searchTerms' => $searchTerms,
            'medias' => $medias,
        ]);
    }

    public function edit(Media $media): View
    {
        return view('media.edit', [
            'media' => $media
        ]);
    }

    public function update(Request $request, Media $media): RedirectResponse
    {
        $validated = $request->validate([
            'original_url' => 'required|string|url',
        ]);

        $media->update($validated);

        return redirect(route('media.index', $request->query()) . '#tabs');
    }


    public function create(Media $media): View
    {
        return view('media.create', [
            'media' => $media
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'original_url' => 'required|string|url',
        ]);

        $media = Media::create($validated);

        return redirect(route('media.index', $request->query()) . '#tabs');
    }

    public function destroy(Request $request, Media $media): RedirectResponse
    {
        $media->delete();
        return redirect(route('media.index', $request->query()) . '#tabs');

    }

    public function bulkDownload()
    {
        $medias = Media::all(['id', 'original_url']);

        $headers = [
            "Content-type" => "text/csv",
            "Content-disposition" => "attachment; filename=media.csv",
        ];
        // https://dev.to/techsolutionstuff/how-to-export-csv-file-in-laravel-example-12ipz
        return response()->stream(function() use ($medias) {
            $file = fopen('php://output', 'w');
            foreach($medias->all() as $media) {
                fputcsv($file, [$media->id, $media->original_url]);
            }
            fclose($file);

        }, 200, $headers);
    }

    public function bulkEdit(Request $request) : View
    {
        return view('media.bulk_edit');
    }

    public function bulkUpdate(Request $request)
    {
        $validated = $request->validate([
            'medias' => 'required|mimes:csv,txt'
        ]);

        if ($request->hasFile('medias') && $request->file('medias')->isValid()) {
            $mediasFile = fopen($request->file('medias')->getPathname(), 'r');
            while($row = fgetcsv($mediasFile)) {
                Bus::chain([
                    new UpdateMediaOriginalUrl(trim($row[0]), trim($row[1])),
                    new DownloadMedia(trim($row[0])),
                ])->onConnection('redis')->dispatch();
            }
            return redirect(route('media.index'));
        }

        return view('media.bulk_edit');
    }
}