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

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('edit', ['contact' => $contact]);
    }

    public function update(ContactRequest $request, $id)
    {
        $form = $request->all();
        Contact::find($id)->update($form);
        return redirect("/contacts/{$id}");
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        return view('delete', ['contact' => $contact]);
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect('/contacts');
    }
}

