<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactAdminController extends Controller
{
    // عرض جميع الرسائل
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    // عرض رسالة مفردة كاملة
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    // حذف رسالة
    public function destroy(Contact $contact)
    {
        $contact->delete();
             return redirect()->route('admin.contacts.index')->with('success', '🗑️ تم حذف الرسالة بنجاح');
    }
}
