<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;
use App\Mail\MailContact;

class ContactUsFormController extends Controller {

    // Create Contact Form
    // public function createForm(Request $request) 
    // {
    //   return view('contact');
    // }

    // Store Contact Form data
    public function ContactUsForm(Request $request) 
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',            
            'subject'=>'required',
            'message' => 'required'
         ]);

         $data = $request->all();
        //dd($data); 
        //  Store data in database
        Contact::create($data);
        $data->toArray();
        $contact_email_to =env('CONTACT_EMAIL_TO');
        // dd($request);
         //dd($request->name);
        // dd($request->email);
        Mail::to($contact_email_to)->send(new ContactMentrow($data)); 
        
    }

    // public function welcomeMail()
    // {
    //     $to_email = 'ashrfdar@gmail.com';
    //     Mail::to($to_email)->send(new ContactMentrow);
    //     return "E-mail has been sent Successfully";  
    // }


}