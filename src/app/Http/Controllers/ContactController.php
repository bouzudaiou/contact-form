<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }

    public function confirm(ContactRequest $request)
    {
    $form = $request->only(['name', 'email', 'tel', 'content', 'category_id']);
        $category = Category::find($form['category_id']);
        return view('confirm', ['form' => $form, 'category' => $category]);
    }

    public function thanks(ContactRequest $request)
    {
        $form = $request->all();
        Contact::create($form);
        return view('thanks');
    }

    public function list()
    {
        $contacts = Contact::with('category')->paginate(10);
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
        $categories = Category::all();
        return view('edit', ['contact' => $contact, 'categories' => $categories]);
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

