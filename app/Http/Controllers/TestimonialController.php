<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    //

    public function add_testimonial()
    {
        return view('admin.testimonial.index');
    }


    public function create_testimonial(Request $request)
    {
        try {
            $request->validate([
                'client_name' => 'required',
                'review' => 'required',
                'testimonial' => 'required',
                'client_image' => 'required|image|max:5000',
            ]);

            // Save the main property image
            if ($request->hasFile('client_image')) {
                $clientImage = $request->file('client_image');
                $clientImageName = time() . '.' . $clientImage->getClientOriginalExtension();
                $clientImage->move(public_path('client_images'), $clientImageName);
            }

            $client_name = $request->client_name;
            $review = $request->review;
            $testimonial = $request->testimonial;

            $testimonial = Testimonial::updateOrCreate(
                [
                    'testimonial' => $testimonial,
                    'client_name' => $client_name,
                    'review' => $review,
                    'client_image' => $clientImageName, // Save the image name instead of the object
                ]
            );

            $testimonial->save();

            return redirect()->route('testimonials')->with('success', 'Testimonial created successfully.');
        } catch (\Exception $e) {
            // Log::error($e);
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }


    public function testimonials()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(2);
        return view('admin.testimonial.testimonials', compact('testimonials'));
    }

    public function delete_testimonial($id)
    {
        $data = Testimonial::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }


    public function edit_testimonial($id)
    {
        $data = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('data'));
    }

    public function update_testimonial(Request $request, $id)
    {
        try {
            $request->validate([
                'client_name' => 'required',
                'review' => 'required',
                'testimonial' => 'required',
                'client_image' => 'nullable|image|max:5000',
            ]);

            // Find the testimonial by ID
            $testimonial = Testimonial::find($id);

            if (!$testimonial) {
                return redirect()->back()->with('error', 'Testimonial not found.');
            }

            // Save the new client logo image if it is provided
            if ($request->hasFile('client_image')) {
                // Delete the old client logo if it exists
                if (file_exists(public_path('client_images/' . $testimonial->client_image))) {
                    unlink(public_path('client_images/' . $testimonial->client_image));
                }

                $clientImage = $request->file('client_image');
                $clientImageName = time() . '.' . $clientImage->getClientOriginalExtension();
                $clientImage->move(public_path('client_images'), $clientImageName);
                $testimonial->client_image = $clientImageName;
            }

            $testimonial->client_name = $request->client_name;
            $testimonial->review = $request->review;
            $testimonial->testimonial = $request->testimonial;

            $testimonial->save();

            return redirect()->route('testimonials')->with('success', 'Testimonial updated successfully.');
        } catch (\Exception $e) {
            // Log::error($e);
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
