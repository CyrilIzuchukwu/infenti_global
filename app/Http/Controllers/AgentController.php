<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    //
    public function agent_dashboard()
    {
        $fiveRecentProperties = Property::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        foreach ($fiveRecentProperties as $property) {
            $property->location = json_decode($property->location);
            $property->details = json_decode($property->details);
        }
        return view('agent.index', ['properties' => $fiveRecentProperties]);
    }





    // profile
    public function profile_setting()
    {
        return view('agent.profile');
    }


    public function profile_update(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        // Update the authenticated user's profile
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }



    public function password_update(Request $request)
    {
        // Validate the request
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8',
            'new_password_confirmation' => 'required|string|min:8|same:new_password',
        ]);

        $user = Auth::user();

        // Check if the old password matches
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'The old password is incorrect.');
        }

        // Check if new password matches confirm password
        if ($request->new_password !== $request->new_password_confirmation) {
            return redirect()->back()->with('error', 'The confirm password does not match.');
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect back with a success message
        return redirect()->route('agent_profile_setting')->with('success', 'Password updated successfully.');
    }


    public function add_property()
    {
        return view('agent.add_property');
    }

    public function store_property(Request $request)
    {
        try {
            // $additional_features = $request->input('additional_features', []);
            // dd($additional_features);
            // Validate the request data
            $request->validate([
                'title' => 'required',
                'property_type' => 'required',
                'property_status' => 'required',
                'price' => 'required|numeric',
                // 'beds' => 'required',
                // 'baths' => 'required',
                'sqfeets' => 'required',
                // 'year_built' => 'required',
                'description' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'property_image' => 'required|image|max:5000',
                'related_images.*' => 'image|max:5000',
            ]);

            // Save the main property image
            if ($request->hasFile('property_image')) {
                $propertyImage = $request->file('property_image');
                $propertyImageName = time() . '.' . $propertyImage->getClientOriginalExtension();
                $propertyImage->move(public_path('property_images'), $propertyImageName);
            }

            // Initialize an array to store related images paths
            $relatedImagesPaths = [];

            // Save the related images
            if ($request->hasFile('related_images')) {
                foreach ($request->file('related_images') as $image) {
                    $relatedImageName = time() . '.' . $image->getClientOriginalName();
                    $image->move(public_path('related_images'), $relatedImageName);
                    $relatedImagesPaths[] = $relatedImageName;
                }
            }


            $title = $request->title;
            $property_type = $request->property_type;
            $property_status = $request->property_status;
            $price = $request->price;
            $beds = $request->beds;
            $baths = $request->baths;
            $sqfeets = $request->sqfeets;
            $year_built = $request->year_built;
            $description = $request->description;
            $address = $request->address;
            $city = $request->city;
            $state = $request->state;

            // additional features


            $location = [
                'address' => $address,
                'city' => $city,
                'state' => $state,
            ];

            $details = [
                'beds' => $beds,
                'baths' => $baths,
                'sqfeets' => $sqfeets,
                'year_built' => $year_built,
            ];


            // $additional_features = $request->additional_features ? $request->additional_features : [];
            $additional_features = $request->input('additional_features', []);


            // Create the property
            $userId = Auth::user()->id;
            $property = Property::UpdateOrCreate([
                'user_id' => $userId,
                'title' => $title,
                'property_type' => $property_type,
                'property_status' => $property_status,
                'price' => $price,
                'description' => $description,

                'location' => json_encode($location),
                'details' => json_encode($details),
                'additional_features' => json_encode($additional_features),

                'terms' => 'Steeze',
                'property_image' => $propertyImageName,
                'related_images' => json_encode($relatedImagesPaths), // Save related images as JSON
            ]);

            $property->save();


            // dd('done');

            return redirect()->back()->with('success', 'Property created successfully.');
        } catch (\Exception $e) {
            // Log::error($e);
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }


    public function property_list()
    {

        $authenticatedUser = Auth::user();


        $properties = Property::with('user')
            ->where('user_id', $authenticatedUser->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);


        foreach ($properties as $property) {
            $property->location = json_decode($property->location);
            $property->details = json_decode($property->details);
        }

        return view('agent.property_list', compact('properties'));
    }



    public function delete_property($id)
    {
        $data = Property::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Property deleted successfully');
    }


    public function view_property($id)

    {
        $property = Property::with('user')->findOrFail($id);

        $property->location = json_decode($property->location, true);
        $property->details = json_decode($property->details, true);
        $property->additional_features = json_decode($property->additional_features, true);
        $property->related_images = json_decode($property->related_images, true);

        return view('agent.property_details', compact('property'));
    }


    public function edit_property($id)
    {
        $data = Property::find($id);
        return view('agent.edit_property', compact('data'));
    }

    public function update_property(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'title' => 'required',
                'property_type' => 'required',
                'property_status' => 'required',
                'price' => 'required|numeric',
                // 'beds' => 'required|numeric',
                // 'baths' => 'required|numeric',
                'sqfeets' => 'required|numeric',
                // 'year_built' => 'required|numeric',
                'description' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'property_image' => 'nullable|image|max:5000',
                'related_images.*' => 'nullable|image|max:5000',
            ]);

            // Find the property by ID
            $property = Property::find($id);
            if (!$property) {
                return redirect()->back()->with('error', 'Property not found.');
            }

            // Save the main property image if provided
            if ($request->hasFile('property_image')) {
                $propertyImage = $request->file('property_image');
                $propertyImageName = time() . '.' . $propertyImage->getClientOriginalExtension();
                $propertyImage->move(public_path('property_images'), $propertyImageName);
                $property->property_image = $propertyImageName;
            }

            // Decode existing related images
            $existingRelatedImages = json_decode($property->related_images, true) ?? [];

            // Save the related images if provided and update the relevant index
            if ($request->hasFile('related_images')) {
                foreach ($request->file('related_images') as $index => $image) {
                    $relatedImageName = time() . '.' . $image->getClientOriginalName();
                    $image->move(public_path('related_images'), $relatedImageName);
                    $existingRelatedImages[$index] = $relatedImageName;
                }
            }

            // Encode the updated related images
            $property->related_images = json_encode(array_values($existingRelatedImages));

            // Update the property details
            $property->title = $request->title;
            $property->property_type = $request->property_type;
            $property->property_status = $request->property_status;
            $property->price = $request->price;
            $property->description = $request->description;

            $location = [
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
            ];
            $property->location = json_encode($location);

            $details = [
                'beds' => $request->beds,
                'baths' => $request->baths,
                'sqfeets' => $request->sqfeets,
                'year_built' => $request->year_built,
            ];
            $property->details = json_encode($details);

            $additional_features = $request->input('additional_features', []);
            $property->additional_features = json_encode($additional_features);

            // Save the updated property
            $property->save();

            return redirect()->route('agent_property_list')->with('success', 'Property updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
