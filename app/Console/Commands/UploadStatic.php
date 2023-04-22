<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UploadStatic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:upload-static';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $files = Storage::disk('public')->allFiles();
        foreach($files as $file) {
            if (str_contains($file, 'git')) {
                continue;
            }
            if (!Storage::disk('s3')->exists($file)) {
                //Storage::putFileAs($directory)
                $fileParts = explode('/', $file);
                $dirPath = array_slice($fileParts, 0, -1);
                $fileName = array_slice($fileParts, -1, 1);
                $path = Storage::disk('s3')->putFileAs('', new File(storage_path('app/public/' . $file)), $file, 'public');

            }
        }

    }
}
