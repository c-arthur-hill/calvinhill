<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $checklists = Contact::count() + 1;
    return view('index', ['checklists' => $checklists]);
})->name('index');

Route::get('/shipment', function () {
    return view('shipment.create');
})->name('shipment');

Route::get('/packing_slip', function () {
    return view('shipment.packing_slip');
})->name('packing_slip');

Route::get('/questions', function () {
    return view('article.articles');
})->name('articles');

Route::get('/deployment', function () {
    return view('misc.deployment');
})->name('deployment');

Route::get('/media/bulk/download', [MediaController::class, 'bulkDownload'])->name('media.bulk.download');
Route::get('/media/bulk/edit', [MediaController::class, 'bulkEdit'])->name('media.bulk.edit');
Route::post('/media/bulk/update', [MediaController::class, 'bulkUpdate'])->middleware(['auth', 'verified'])->name('media.bulk.update');

Route::Resource('media', MediaController::class)
    ->parameters(['media' => 'media'])
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::Resource('media', MediaController::class)
    ->parameters(['media' => 'media'])
    ->only(['index', 'create', 'edit', 'delete']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/contact', [Controller::class, 'updateContact'])->name('contact.update');
Route::get('/success/{contactID}', function($contactID) {

    $checklists = Contact::count() + 1;
    return view('index', [
        'success' => "Success! I'll be in touch shortly",
        'contactID' => $contactID,
        'checklists' => $checklists
    ]);
})->name('success');


require __DIR__.'/auth.php';
