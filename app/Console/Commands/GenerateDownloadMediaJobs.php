<?php

namespace App\Console\Commands;

use App\Jobs\DownloadMedia;
use App\Jobs\GenerateThumbnail;
use App\Jobs\UpdateMediaOriginalUrl;
use App\Repositories\MediaRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;

class GenerateDownloadMediaJobs extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-download-media-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(MediaRepository $mediaRepository): void
    {
        $medias = $mediaRepository->getMediaMissingThumbnailsOrDownloads();
        foreach($medias as $media) {
            Bus::chain([
                new DownloadMedia($media->id)
            ])->onConnection('redis')->dispatch();
        }


    }
}