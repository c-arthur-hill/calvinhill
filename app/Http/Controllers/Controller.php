<?php

namespace App\Http\Controllers;

use App\Mail\ContactSubmitted;
use App\Models\Contact;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function updateContact(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'max:255',
        ]);
        $contact = Contact::create($validated);
        Mail::to('calvin@calvinhill.com')->send(new ContactSubmitted($contact));
        return redirect('success');

    }
}
