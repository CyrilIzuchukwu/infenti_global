<?php

namespace App\Http\Controllers;

use App\Mail\EnquiryMail;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    //
    public function make_contact(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        // Create a new enquiry
        $enquiry = Enquiry::create($validated);

        // Prepare email data
        $mailData = [
            'title' => 'New Enquiry Received',
            'first_name' => $enquiry->first_name,
            'last_name' => $enquiry->last_name,
            'email' => $enquiry->email,
            'phone' => $enquiry->phone,
            'message' => $enquiry->message,
        ];

        try {
            // Send email
            Mail::to('ifenetigloabl@gmail.com')->send(new EnquiryMail($mailData));
            return response()->json(['success' => 'Message Sent.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email. Please try again.'], 500);
        }
    }
}
