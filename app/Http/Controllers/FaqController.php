<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Property;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //

    public function FAQs()
    {
        $faq_datas = Faq::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.Faq.index', compact('faq_datas'));
    }

    public function store_faq(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $question = $request->question;
        $answer = $request->answer;

        $faq = Faq::UpdateOrCreate([
            'question' => $question,
            'answer' => $answer,
        ]);

        $faq->save();
        return redirect()->back()->with('success', 'FAQ created successfully.');
    }


    public function delete_faq($id)
    {
        $data = Faq::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'FAQ deleted successfully');
    }


    public function edit_faq($id)
    {
        $data = Faq::find($id);
        return view('admin.Faq.edit_faq', compact('data'));
    }

    public function update_faq(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();
        return redirect()->route('FAQs')->with('success', 'FAQ updated successfully.');
    }
}
