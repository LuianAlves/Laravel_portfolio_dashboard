<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{   
    // Admin Profile
    public function AdminContact() {
        $contacts = Contact::all();

        return view('admin.contact.index', compact('contacts'));
    }

    public function AdminAddContact(){
        return view('admin.contact.create');
    }

    public function AdminStoreContact(Request $request){

        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Info Inserted Successfully');
    }

    // Admin Message
    public function AdminMessage(){
        $message = ContactForm::all();

        return view('admin.contact.message', compact('message'));
    }
    // Home
    public function Contact(){
        $contact = Contact::get()->first();
        return view('app.contact.index', compact('contact'));
    }

    public function ContactForm(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('contact')->with('success', 'Your Message Send Successfully');
    }   
}
