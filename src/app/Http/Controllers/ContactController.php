<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
    $form = $request->only(['name', 'email', 'tel', 'content']);
        return view('confirm', ['form' => $form]);
    }

    public function thanks(ContactRequest $request)
    {
        $form = $request->all();
        Contact::create($form);
        return view('thanks');
    }

    public function list()
    {
        $contacts = Contact::all();
        return view('list', ['contacts' => $contacts]);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('show', ['contact' => $contact]);
    }
}
