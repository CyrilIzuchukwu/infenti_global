<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function property_details($id)

    {
        $data = Property::with('user')->find($id);
        // dd($data);

        $data->location = json_decode($data->location, true);
        $data->details = json_decode($data->details, true);
        $data->additional_features = json_decode($data->additional_features, true);
        $data->related_images = json_decode($data->related_images, true);

        return view('propertyDetails', compact('data'));
    }

    
}
