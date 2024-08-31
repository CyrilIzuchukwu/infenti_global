<?php

namespace App\Providers;

use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Property;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {

            // Get the sorting option from the request
            $sort = request()->input('sort', 'created_at_desc');
            $type = request()->input('type');

            // Determine the sorting column and direction based on the selected option
            switch ($sort) {
                case 'price_asc':
                    $orderBy = 'price';
                    $direction = 'asc';
                    break;
                case 'price_desc':
                    $orderBy = 'price';
                    $direction = 'desc';
                    break;
                case 'bedrooms_asc':
                    $orderBy = 'details->beds'; // Assuming details is a JSON column
                    $direction = 'asc';
                    break;
                case 'bedrooms_desc':
                    $orderBy = 'details->beds';
                    $direction = 'desc';
                    break;
                case 'bathrooms_asc':
                    $orderBy = 'details->baths'; // Assuming details is a JSON column
                    $direction = 'asc';
                    break;
                case 'bathrooms_desc':
                    $orderBy = 'details->baths';
                    $direction = 'desc';
                    break;
                case 'size_asc':
                    $orderBy = 'details->sqfeets'; // Assuming details is a JSON column
                    $direction = 'asc';
                    break;
                case 'size_desc':
                    $orderBy = 'details->sqfeets';
                    $direction = 'desc';
                    break;
                case 'created_at_asc':
                    $orderBy = 'created_at';
                    $direction = 'asc';
                    break;
                case 'created_at_desc':
                default:
                    $orderBy = 'created_at';
                    $direction = 'desc';
            }

            // Fetch the properties with sorting and type filter
            $query = Property::with('user');

            if ($type) {
                $query->where('property_status', $type);
            }

            // dd($query);


            // Fetch the properties with sorting
            $all_properties = $query->orderBy($orderBy, $direction)->paginate(9);

            // Decode the JSON location for each property
            foreach ($all_properties as $property) {
                $property->location = json_decode($property->location);
                $property->details = json_decode($property->details);
            }

            $view->with('all_properties', $all_properties);

            // $all_properties = Property::with('user')->orderBy('created_at', 'desc')->paginate(9);

            // // Decode the JSON location for each property
            // foreach ($all_properties as $property) {
            //     $property->location = json_decode($property->location);
            //     $property->details = json_decode($property->details);
            // }
            // $view->with('all_properties', $all_properties);



            // Fetch one random property for featured_property1
            $featured_property1 = Property::with('user')
                ->inRandomOrder()
                ->first();

            // Decode the JSON fields if they are not already decoded
            if ($featured_property1) {
                if (is_string($featured_property1->location)) {
                    $featured_property1->location = json_decode($featured_property1->location);
                }
                if (is_string($featured_property1->details)) {
                    $featured_property1->details = json_decode($featured_property1->details);
                }
            }
            // Pass the properties to the view
            $view->with('featured_property1', $featured_property1);



            $excludedPropertyId = $featured_property1 ? $featured_property1->id : null;

            // Fetch two distinct random properties, excluding the one already fetched
            $featured_property2 = Property::with('user')
                ->where('id', '!=', $excludedPropertyId)
                ->inRandomOrder()
                ->limit(2)
                ->get();

            // Check if we need to fetch a third property to ensure distinctness
            if ($featured_property2->count() < 2) {
                // Fetch additional properties until we have 2 distinct ones
                $additional_properties = Property::with('user')
                    ->where('id', '!=', $excludedPropertyId)
                    ->whereNotIn('id', $featured_property2->pluck('id'))
                    ->inRandomOrder()
                    ->limit(2 - $featured_property2->count())
                    ->get();

                // Merge additional properties into the main collection
                $featured_property2 = $featured_property2->merge($additional_properties);
            }

            // Decode the JSON fields if they are not already decoded
            foreach ($featured_property2 as $property) {
                if (is_string($property->location)) {
                    $property->location = json_decode($property->location);
                }
                if (is_string($property->details)) {
                    $property->details = json_decode($property->details);
                }
            }

            $view->with('featured_property2', $featured_property2);



            $for_sell = Property::with('user')
                ->where('property_status', 'sell')
                ->orderBy('created_at', 'desc')
                ->paginate(9);
            foreach ($for_sell as $property) {
                $property->location = json_decode($property->location);
                $property->details = json_decode($property->details);
            }
            $view->with('for_sell', $for_sell);


            $for_rent = Property::with('user')
                ->where('property_status', 'sell')
                ->orderBy('created_at', 'desc')
                ->paginate(9);
            foreach ($for_rent as $property) {
                $property->location = json_decode($property->location);
                $property->details = json_decode($property->details);
            }
            $view->with('for_sell', $for_sell);



            $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
            $view->with('testimonials', $testimonials);



            $frontEndFaqs = Faq::orderBy('created_at', 'desc')->get();
            $view->with('frontEndFaqs', $frontEndFaqs);



            $propertyCount = Property::count();
            $view->with('propertyCount', $propertyCount);



            $agentPropertyCount = Property::where('user_id', Auth::id())->count();
            $view->with(
                'agentPropertyCount',
                $agentPropertyCount
            );



            $propertyRentCount = Property::where('property_status', "rent")->count();
            $view->with('propertyRentCount', $propertyRentCount);

            $sellCount = Property::where('property_status', "sell")->count();
            $view->with('sellCount', $sellCount);


            $testimonialCount = Testimonial::count();
            $view->with('testimonialCount', $testimonialCount);

            $enquiryCount = Enquiry::count();
            $view->with('enquiryCount', $enquiryCount);

            $agentCount = User::where('role_as', "2")->count();
            $view->with('agentCount', $agentCount);
        });
    }
}
