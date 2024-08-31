<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\State;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = Property::query();

        // Apply filters based on request
        if ($request->filled('city')) {
            $query->where('location->city', $request->city);
        }

        if ($request->filled('property')) {
            $query->where('property_type', $request->property);
        }

        if ($request->filled('price')) {
            $priceRange = $request->price;

            if (strpos($priceRange, '-') !== false) {
                // Handle standard range
                [$minPrice, $maxPrice] = explode('-', $priceRange);
                $minPrice *= 1000000; // Convert to Naira
                $maxPrice *= 1000000; // Convert to Naira
            } else {
                // Handle "200000000+" case
                $minPrice = (int) $priceRange * 1000000;
                $maxPrice = PHP_INT_MAX; // No upper limit
            }

            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        $searched_properties = $query->paginate(9);

        // Decode the JSON location for each property
        foreach ($searched_properties as $property) {
            $property->location = json_decode($property->location);
            $property->details = json_decode($property->details);
        }

        $states = State::all();

        return view('property_search', [
            'searched_properties' => $searched_properties,
            'states' => $states
        ]);
    }
}
