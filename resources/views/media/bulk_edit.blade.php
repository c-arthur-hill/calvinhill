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
        <div class="col-lg-5 mx-auto">
            <h3>Repeating the previous step, hundreds of times</h3>
            <p>The employee using the station in the previous step had hundreds of broken files. A customer submitted logos and the background color wasn't printing correctly.</p>
            <p>He contacted the customer. They fixed the background.</p>
            <h3>All at once</h3>
            <p>He didn't want to spend all afternoon inputting these.</p>
            <p>I built this download / upload form to correct them "in bulk".</p>
            <p>He downloads the existing medias in a comma separated values (CSV) file. He opens that in Excel. He finds and replaces the effected URLs.</p>
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
            <p>Like the previous, Laravel has the edit route to serve the form and the update route to handle the submission.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card rounded-0 mb-3">
                <div class="card-header">
                    <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/routes/web.php">/routes/web.php</a>
                </div>
                <div class="card-body">
<pre ><code><span class="text-secondary">  35</span>  Route::get('/media/bulk/download', [MediaController::class, 'bulkDownload'])->name('media.bulk.download');
<span class="text-secondary">  36</span>  Route::get(<mark>'/media/bulk/edit'</mark>, <mark>[MediaController::class, 'bulkEdit']</mark>)->name('media.bulk.edit');
<span class="text-secondary">  37</span>  Route::post(<mark>'/media/bulk/update'</mark>, <mark>[MediaController::class, 'bulkUpdate']</mark>)->middleware(['auth', 'verified'])->name('media.bulk.update');</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <p>After looping through the file, the <a href="https://laravel.com/docs/10.x/queues#chain-connection-queue" target="_blank">Bus</a> deploys two jobs for each row.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card rounded-0 mb-3">
                <div class="card-header">
                    <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/app/Http/Controllers/MediaController.php">/app/Http/Controllers/MediaController.php</a>
                </div>
                <div class="card-body">
<pre ><code><span class="text-secondary"> 121</span>  public function bulkUpdate(Request $request)
<span class="text-secondary"> 122</span>  {
<span class="text-secondary"> 123</span>      $validated = $request->validate([
<span class="text-secondary"> 124</span>          'medias' => 'required|mimes:csv,txt'
<span class="text-secondary"> 125</span>      ]);
<span class="text-secondary"> 126</span>
<span class="text-secondary"> 127</span>      if ($request->hasFile('medias') && $request->file('medias')->isValid()) {
<span class="text-secondary"> 128</span>          <mark>$mediasFile = fopen($request->file('medias')->getPathname(), 'r');</mark>
<span class="text-secondary"> 129</span>          <mark>while($row = fgetcsv($mediasFile)) {</mark>
<span class="text-secondary"> 130</span>              <mark>Bus::chain([</mark>
<span class="text-secondary"> 131</span>                  <mark>new UpdateMediaOriginalUrl(trim($row[0]), trim($row[1])),</mark>
<span class="text-secondary"> 132</span>                  <mark>new DownloadMedia(trim($row[0])),</mark>
<span class="text-secondary"> 133</span>              <mark>])->onConnection('redis')->dispatch();</mark>
<span class="text-secondary"> 134</span>          <mark>}</mark>
<span class="text-secondary"> 135</span>          return redirect(route('media.index'));
<span class="text-secondary"> 136</span>      }
<span class="text-secondary"> 137</span>
<span class="text-secondary"> 138</span>      return view('media.bulk_edit');
<span class="text-secondary"> 139</span>  }</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <p>The UpdateMediaOriginalUrl class initializes two properties using <a href="https://www.php.net/manual/en/language.oop5.decon.php#example-228">PHP constructor property promotion</a>. These were passed in from the file on line 131 above.</p>
            <p>The query finds the row in the "medias" database table with a matching id. This prevents database queries in the controller.
            <p>It updates the "original_url" column.</p>
            <p>It only supports updates. It doesn't handle errors.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card rounded-0 mb-3">
                <div class="card-header">
                    <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/app/Jobs/UpdateMediaOriginalUrl.php">app/Jobs/UpdateMediaOriginalUrl.php</a>
                </div>
                <div class="card-body">
<pre ><code>
<span class="text-secondary">  1</span>  &lt;?php
<span class="text-secondary">  2</span>
<span class="text-secondary">  3</span>  namespace App\Jobs;
<span class="text-secondary">  4</span>
<span class="text-secondary">  5</span>  use App\Models\Media;
<span class="text-secondary">  6</span>  use Illuminate\Bus\Queueable;
<span class="text-secondary">  7</span>  use Illuminate\Contracts\Queue\ShouldQueue;
<span class="text-secondary">  8</span>  use Illuminate\Foundation\Bus\Dispatchable;
<span class="text-secondary">  9</span>  use Illuminate\Queue\InteractsWithQueue;
<span class="text-secondary">  10</span>  use Illuminate\Queue\SerializesModels;
<span class="text-secondary">  11</span>
<span class="text-secondary">  12</span>  class UpdateMediaOriginalUrl implements ShouldQueue
<span class="text-secondary">  13</span>  {
<span class="text-secondary">  14</span>      use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
<span class="text-secondary">  15</span>
<span class="text-secondary">  16</span>      public function __construct(<mark>protected string $mediaId, protected string $newUrl</mark>)
<span class="text-secondary">  17</span>      {}
<span class="text-secondary">  18</span>
<span class="text-secondary">  19</span>      public function handle()
<span class="text-secondary">  20</span>      {
<span class="text-secondary">  21</span>            <mark>$media = Media::find($this->mediaId);</mark>
<span class="text-secondary">  22</span>            <mark>$media->original_url = $this->newUrl;</mark>
<span class="text-secondary">  23</span>            <mark>$media->save();</mark>
<span class="text-secondary">  24</span>      }
<span class="text-secondary">  25</span>  }</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <p>The DownloadMedia job uses cURL to download the url to a temporary local file. If the original URL breaks, I need my own copy.</p>
            <p>The <a href="https://imagemagick.org/script/mogrify.php" target="_blank">ImageMagick</a> command "mogrify" creates a 100 pixel x 100 pixel thumbnail.</p>
            <p>Both of these are stored in S3. I deploy on Heroku, which doesn't have a stable filesystem. It gets deleted occasionally. I store files in an Amazon Web Service tool called S3. This integrates into Heroku using a service called Bucketeer. S3 is commonly used for this purpose.</p>
            <p>The S3 paths to the thumbnail and uploaded copy are saved to the database. These can be used to display the images in webpages.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card rounded-0 mb-3">
                <div class="card-header">
                    <a target="_blank" href="https://github.com/c-arthur-hill/calvinhill/blob/e57104621b3720c306b12679e2aed77b4e2df978/app/Jobs/Downlapp/Jobs/Downlapp/Jobs/Downlapp/Jobs/Downlapp/Jobs/DownloadMedia.php">/app/Jobs/DownloadMedia.php</a>
                </div>
                <div class="card-body">
<pre ><code><span class="text-secondary"> 212</span>  public function handle()
<span class="text-secondary"> 213</span>  {
<span class="text-secondary"> 214</span>      $media = Media::find($this->mediaId);
<span class="text-secondary"> 215</span>      $ext = pathinfo(parse_url($media->original_url, PHP_URL_PATH), PATHINFO_EXTENSION);
<span class="text-secondary"> 216</span>      if ($ext) {
<span class="text-secondary"> 217</span>          $ext = '.' . $ext;
<span class="text-secondary"> 218</span>      }
<span class="text-secondary"> 219</span>      <mark>$local = tmpfile();</mark>
<span class="text-secondary"> 220</span>
<span class="text-secondary"> 221</span>
<span class="text-secondary"> 222</span>      // curl original url
<span class="text-secondary"> 223</span>      $ch = curl_init();
<span class="text-secondary"> 224</span>      curl_setopt($ch, CURLOPT_URL, <mark>$media->original_url</mark>);
<span class="text-secondary"> 225</span>      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
<span class="text-secondary"> 226</span>      // return file instead of true/false
<span class="text-secondary"> 227</span>      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
<span class="text-secondary"> 228</span>      curl_setopt($ch, CURLOPT_FILE, <mark>$local</mark>);
<span class="text-secondary"> 229</span>      $file = curl_exec($ch);
<span class="text-secondary"> 230</span>      curl_close($ch);
<span class="text-secondary"> 231</span>
<span class="text-secondary"> 232</span>      if (!$ext) {
<span class="text-secondary"> 233</span>          $mime = mime_content_type($local);
<span class="text-secondary"> 234</span>          $mimeExt = $this->mime2ext($mime);
<span class="text-secondary"> 235</span>          if ($mimeExt) {
<span class="text-secondary"> 236</span>              $ext = '.' . $mimeExt;
<span class="text-secondary"> 237</span>          }
<span class="text-secondary"> 238</span>      }
<span class="text-secondary"> 239</span>
<span class="text-secondary"> 240</span>
<span class="text-secondary"> 241</span>      $thumbnail = tmpfile();
<span class="text-secondary"> 242</span>      $thumbnailPath = stream_get_meta_data($thumbnail)['uri'];
<span class="text-secondary"> 243</span>      $localPath = stream_get_meta_data($local)['uri'];
<span class="text-secondary"> 244</span>      <mark>exec("mogrify -format jpeg -write $thumbnailPath -thumbnail 100x100 $localPath");</mark>
<span class="text-secondary"> 245</span>
<span class="text-secondary"> 246</span>      <mark>$media->downloaded = Storage::disk('s3')->putFileAs('img/downloads', new File($localPath), $media->id . $ext, 'public');</mark>
<span class="text-secondary"> 247</span>      <mark>$media->thumbnail = Storage::disk('s3')->putFileAs('img/thumbnails', new File($thumbnailPath), $media->id . '.jpg', 'public');</mark>
<span class="text-secondary"> 248</span>      $media->downloaded_at = new \DateTime('now', (new \DateTimezone('UTC')));
<span class="text-secondary"> 249</span>      $media->save();
<span class="text-secondary"> 250</span>
<span class="text-secondary"> 251</span>      fclose($local);
<span class="text-secondary"> 252</span>      fclose($thumbnail);
<span class="text-secondary"> 253</span>
<span class="text-secondary"> 254</span>  }</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection