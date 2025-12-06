<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Tag;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('index', ['categories' => $categories, 'tags' => $tags]);
    }

    public function confirm(ContactRequest $request)
    {
    $form = $request->only(['name', 'email', 'tel', 'content', 'category_id', 'tag_ids']);
    $category = Category::find($form['category_id']);
    $tags = Tag::find($form['tag_ids']);
    return view('confirm', ['form' => $form, 'category' => $category, 'tags' => $tags]);
    }

    public function thanks(ContactRequest $request)
    {
    $form = $request->all();
    $contact = Contact::create($form);
    $contact->tags()->attach($form['tag_ids']);
    return view('thanks');
    }

    public function list()
    {
    $contacts = Contact::with(['category', 'tags'])->paginate(10);
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
        $tags = Tag::all();
        return view('edit', ['contact' => $contact, 'categories' => $categories, 'tags' => $tags]);
    }

    public function update(ContactRequest $request, $id)
    {
    $form = $request->all();
    $contact = Contact::find($id);
    $contact->update($form);
    $contact->tags()->sync($form['tag_ids'] ?? []);
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

