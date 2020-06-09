<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Contants\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function submitContact(Request $request)
    {
        $validateData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_email' => 'required|email',
            'message' => 'required',
            'contact_company_name' => ''
        ]);

        $contact = new Contact();
        $contact->create($validateData);

        return redirect()->back()->with(['success' => Message::CONTACT_SUCCESS]);
    }
}
