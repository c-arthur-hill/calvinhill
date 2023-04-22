<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class MediaRepository
{
    public function getMediaMissingThumbnailsOrDownloads()
    {
        return DB::table('medias')
            ->where('thumbnail', '=', '')
            ->orWhere('downloaded', '=', '')
            ->get();
    }
}