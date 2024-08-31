<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    //
    // inquiry
    public function enquiry()
    {

        $enquiries = Enquiry::orderBy('created_at', 'desc')->get();
        return view('admin.inquiry', compact('enquiries'));
    }

    public function delete_message($id)
    {
        $data = Enquiry::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Message deleted');
    }
}
