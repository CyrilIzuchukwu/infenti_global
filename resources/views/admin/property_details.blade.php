@extends('layout.admin')
@section('content')

<div class="container-fluid">
    <div class="form-head page-titles d-flex  align-items-center">
        <div class="me-auto  d-lg-block d-block">
            <h4 class="mb-1">Property Details</h4>

        </div>
        <a href="{{ route('edit_property', $property->id) }}" class="btn btn-danger rounded me-3">Update</a>
        <a href="" class="btn btn-primary rounded light">Refresh</a>
    </div>
    <div class="row">

        <div class="col-xl-12 col-xxl-12 col-md-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="lightgallery" class="front-view-slider mb-sm-5 mb-3 owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage">
                                        <div class="owl-item active" style="width: 100%;">
                                            <div class="items">
                                                <div class="front-view">
                                                    <img src="{{ asset('property_images/' . $property->property_image) }}" alt=" /">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <a href="javascript:void(0);" class="btn btn-primary rounded mb-4">For {{ ucfirst($property->property_status) }}</a>
                                <div class="d-md-flex d-block mb-sm-5 mb-3">
                                    <div class="me-auto mb-md-0 mb-4">
                                        <h3>{{ $property->title }}</h3>
                                        <span class="fs-16">
                                            <svg width="24" height="24" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9475 4.78947C8.94136 4.78947 7.02346 5.55047 5.61418 6.89569C4.20599 8.23987 3.42116 10.056 3.42116 11.9426C3.42116 14.7033 5.29958 17.3631 7.32784 19.4068C8.3259 20.4124 9.32653 21.2351 10.0786 21.8068C10.434 22.077 10.7326 22.29 10.9475 22.4389C11.1623 22.29 11.4609 22.077 11.8163 21.8068C12.5684 21.2351 13.569 20.4124 14.5671 19.4068C16.5954 17.3631 18.4738 14.7033 18.4738 11.9426C18.4738 10.056 17.689 8.23987 16.2808 6.89569C14.8715 5.55047 12.9536 4.78947 10.9475 4.78947ZM10.9475 23.2632C10.5801 23.8404 10.58 23.8403 10.5797 23.8401L10.5792 23.8398L10.5774 23.8387L10.5718 23.835L10.5517 23.8221C10.5345 23.8109 10.5097 23.7948 10.4779 23.7737C10.4143 23.7317 10.3224 23.6701 10.2063 23.5901C9.97419 23.43 9.64481 23.1959 9.25054 22.8962C8.46315 22.2977 7.41114 21.4333 6.35658 20.3707C4.27957 18.278 2.05273 15.2776 2.05273 11.9426C2.05273 9.67199 2.99797 7.50121 4.66932 5.90583C6.33959 4.31148 8.59845 3.42105 10.9475 3.42105C13.2965 3.42105 15.5554 4.31148 17.2256 5.90583C18.897 7.50121 19.8422 9.67199 19.8422 11.9426C19.8422 15.2776 17.6154 18.278 15.5384 20.3707C14.4838 21.4333 13.4318 22.2977 12.6444 22.8962C12.2501 23.1959 11.9207 23.43 11.6886 23.5901C11.5725 23.6701 11.4806 23.7317 11.417 23.7737C11.3979 23.7864 11.3814 23.7972 11.3675 23.8063C11.3582 23.8124 11.3501 23.8176 11.3432 23.8221L11.3232 23.835L11.3175 23.8387L11.3158 23.8398L11.3152 23.8401C11.315 23.8403 11.3148 23.8404 10.9475 23.2632ZM10.9475 23.2632L11.3148 23.8404C11.0907 23.983 10.8043 23.983 10.5801 23.8404L10.9475 23.2632Z" fill="#666666"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9474 10.2632C9.81378 10.2632 8.89479 11.1822 8.89479 12.3158C8.89479 13.4494 9.81378 14.3684 10.9474 14.3684C12.0811 14.3684 13.0001 13.4494 13.0001 12.3158C13.0001 11.1822 12.0811 10.2632 10.9474 10.2632ZM7.52637 12.3158C7.52637 10.4264 9.05802 8.89474 10.9474 8.89474C12.8368 8.89474 14.3685 10.4264 14.3685 12.3158C14.3685 14.2052 12.8368 15.7368 10.9474 15.7368C9.05802 15.7368 7.52637 14.2052 7.52637 12.3158Z" fill="#666666"></path>
                                            </svg>
                                            {{ $property->location['address'] }} , {{ $property->location['city'] }}</span>
                                    </div>
                                    <div class="ms-md-4 text-md-right">
                                        <p class="text-black mb-1 me-1" style="font-size: 18px;">Price</p>
                                        <h3 class="text-primary"> &#8358;{{ number_format($property->price) }} </h3>
                                    </div>
                                </div>
                                <div class="mb-sm-5 mb-2">
                                    @if($property->property_type == "house")
                                    <a href="javascript:void(0);" class="btn btn-primary light rounded me-2 mb-sm-0 mb-2">
                                        <svg class="me-2" width="28" height="19" viewBox="0 0 28 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.1 8.03846C25.7498 8.03846 28 10.2859 28 13.1538V17.5385H25.9V19H24.5V17.5385H3.5V19H2.1V17.5385H0V13.1538C0 10.3876 2.17398 8.03846 4.9 8.03846H23.1ZM21.7 0C23.5821 0 25.2005 1.57962 25.2 3.65385L25.2005 7.14522C24.5639 6.78083 23.8517 6.57692 23.1 6.57692L21.7 6.57618C21.7 5.32466 20.7184 4.38462 19.6 4.38462H15.4C14.8622 4.38462 14.3716 4.59567 14.0001 4.94278C13.629 4.59593 13.1381 4.38462 12.6 4.38462H8.4C7.24044 4.38462 6.30038 5.36575 6.3 6.57619L4.9 6.57692C4.14851 6.57692 3.43653 6.7807 2.8 7.14488V3.65385C2.8 1.68899 4.3096 0 6.3 0H21.7ZM12.6 5.84579C12.9799 5.84579 13.3 6.21117 13.3 6.57692L7.7 6.57618C7.7 6.12909 8.04101 5.84615 8.4 5.84615L12.6 5.84579ZM19.6 5.85107C19.9961 5.84578 20.2996 6.20175 20.3 6.57618H14.7C14.7 6.1227 15.041 5.84615 15.4 5.84615L19.6 5.85107Z" fill="#3B4CB8"></path>
                                        </svg>
                                        {{ $property->details['beds'] }} Bedroom
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-primary light rounded me-2 mb-sm-0 mb-2">
                                        <svg class="me-2" width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 10.4211L18.6388 12.249C18.0616 15.1706 15.4406 17.3684 12.5829 17.3684H11.6923L13.4082 22H2.28779V10.4211H19ZM5.14753 0C6.68536 0 8.00727 1.29706 8.00727 2.89474V7.52632H18.8743V8.68421H8.00727V9.26316H1.1439L1.14378 11.0001C0.481336 10.4964 0 9.64309 0 8.68421V2.89474C0 1.33809 1.25234 0 2.85974 0H5.14753Z" fill="#3B4CB8"></path>
                                        </svg>
                                        {{ $property->details['baths'] }} Bathroom
                                    </a>
                                    @else
                                    @endif
                                    <a href="javascript:void(0);" class="btn btn-primary light rounded mb-sm-0 mb-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 21H3V3H21V21ZM19 5H5V19H19V5ZM10 15V11H8V13H6V11H4V15H6V13H8V15H10ZM18 13V11H12V15H18V13ZM16 13H14V13.5H16V13Z" fill="#3B4CB8" />
                                        </svg>
                                        {{ number_format($property->details['sqfeets']) }} Sq feet
                                    </a>
                                </div>
                                <h4>Description</h4>
                                <p style="font-size: 16px;">
                                    {{ $property->description }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h3 class="fs-20 text-black mb-0">Featured Images</h3>
                        </div>
                        <div class="card-body">

                            <div class="">
                                <div class="row">
                                    @if(!empty($property->related_images))
                                    @foreach($property->related_images as $image)
                                    <div class="col-md-3 mb-2">
                                        <div style="width: 100%; height: 200px;">
                                            <img src="{{ asset('related_images/' . $image) }}" alt="Related Image" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($property->property_type == "house")
                <div class="col-xl-12">
                    <div class="card property-features">
                        <div class="card-header border-0 pb-0">
                            <h3 class="fs-20 text-black mb-0">More Features</h3>
                        </div>
                        <div class="card-body">
                            <ul>
                                @if($property->additional_features)
                                @foreach($property->additional_features as $feature)
                                <li style="font-size: 16px;"><i class="las la-check-circle"></i>{{ ucfirst($feature) }}</li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @else
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
