<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use DateTime;
use Exception;
use Illuminate\Http\Request;


class ContactUsController extends Controller
{


    public function index()
    {
        $contacts = ContactUs::all(); // Fetch all contacts
        return view('ContactUs.index', compact('contacts'));
    }

    public function show(ContactUs $contact) // Route parameter for specific contact
    {
        return view('ContactUs.responder', compact('contact'));
    }
}
