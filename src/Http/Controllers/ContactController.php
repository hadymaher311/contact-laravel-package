<?php

namespace hady\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use hady\Contact\Models\Contact;
use Illuminate\Support\Facades\Mail;
use hady\Contact\Mail\ContactMailable;

class ContactController extends Controller
{
    public function index() {
        // view::package
        return view('contact::contact');
    }

    public function send(Request $request) {
        Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->name));
        Contact::create($request->all());
        return redirect('contact');
    }
}
