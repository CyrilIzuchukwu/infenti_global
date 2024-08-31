        @extends('layout.admin')
        @section('content')


        <!--**********************************
            Content body start
        ***********************************-->
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
                <div class="me-auto d-lg-block d-block">
                    <h2 class="text-black font-w600">Dashboard</h2>
                    <p class="mb-0">Welcome to Ifenti Global Service Admin</p>
                </div>
                <a href="{{ route('admin_dashboard') }}" class="btn btn-primary rounded light">Refresh</a>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xxl-6">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card bg-danger property-bx text-white">
                                <div class="card-body">
                                    <div class="media d-sm-flex d-block align-items-center">
                                        <span class="me-4 d-block mb-sm-0 mb-3">
                                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M31.8333 79.1667H4.16659C2.33325 79.1667 0.833252 77.6667 0.833252 75.8333V29.8333C0.833252 29 1.16659 28 1.83325 27.5L29.4999 1.66667C30.4999 0.833332 31.8333 0.499999 32.9999 0.999999C34.3333 1.66667 34.9999 2.83333 34.9999 4.16667V76C34.9999 77.6667 33.4999 79.1667 31.8333 79.1667ZM7.33325 72.6667H28.4999V11.6667L7.33325 31.3333V72.6667Z" fill="white" />
                                                <path d="M75.8333 79.1667H31.6666C29.8333 79.1667 28.3333 77.6667 28.3333 75.8334V36.6667C28.3333 34.8334 29.8333 33.3334 31.6666 33.3334H75.8333C77.6666 33.3334 79.1666 34.8334 79.1666 36.6667V76C79.1666 77.6667 77.6666 79.1667 75.8333 79.1667ZM34.9999 72.6667H72.6666V39.8334H34.9999V72.6667Z" fill="white" />
                                                <path d="M60.1665 79.1667H47.3332C45.4999 79.1667 43.9999 77.6667 43.9999 75.8334V55.5C43.9999 53.6667 45.4999 52.1667 47.3332 52.1667H60.1665C61.9999 52.1667 63.4999 53.6667 63.4999 55.5V75.8334C63.4999 77.6667 61.9999 79.1667 60.1665 79.1667ZM50.6665 72.6667H56.9999V58.8334H50.6665V72.6667Z" fill="white" />
                                            </svg>
                                        </span>
                                        <div class="media-body mb-sm-0 mb-3 me-5">
                                            <h4 class="fs-22 text-white">Total Properties</h4>
                                            <div class="progress mt-3 mb-2" style="height:8px;">
                                                <div class="progress-bar bg-white progress-animated" style="width: 100%; height:8px;" role="progressbar">
                                                    <span class="sr-only">100% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="fs-35 font-w500">{{ $propertyCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12 col-md-3">
                    <div class="card property-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-3">
                                    <h2 class="fs-28 text-black font-w600">{{ $sellCount }}</h2>
                                    <p class="property-p mb-0 text-black font-w500">For Sell</p>
                                </div>
                                <div class="d-inline-block position-relative">

                                    <small class="text-primary"><i class="ri-building-2-fill"></i></small>
                                    <span class="circle bgl-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3">
                    <div class="card property-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-3">
                                    <h2 class="fs-28 text-black font-w600">{{ $propertyRentCount }}</h2>
                                    <p class="property-p mb-0 text-black font-w500">For Rent</p>
                                </div>
                                <div class="d-inline-block position-relative ">
                                    <small class="text-primary"><i class="ri-building-line"></i></small>
                                    <span class="circle bgl-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card property-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-3">
                                    <h2 class="fs-28 text-black font-w600">{{ $testimonialCount }}</h2>
                                    <p class="property-p mb-0 text-black font-w500">Testimonials</p>
                                </div>
                                <div class="d-inline-block position-relative">
                                    <small class="text-primary"><i class="ri-a-b"></i></small>
                                    <span class="circle bgl-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="card property-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-3">
                                    <h2 class="fs-28 text-black font-w600">{{ $enquiryCount }}</h2>
                                    <p class="property-p mb-0 text-black font-w500">Total Enquiries</p>
                                </div>
                                <div class="d-inline-block position-relative">
                                    <small class="text-primary"><i class="ri-chat-3-line"></i></small>
                                    <span class="circle bgl-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card property-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-3">
                                    <h2 class="fs-28 text-black font-w600">{{ $agentCount }}</h2>
                                    <p class="property-p mb-0 text-black font-w500">Total Number of Agents</p>
                                </div>
                                <div class="d-inline-block position-relative">
                                    <small class="text-primary"><i class="ri-group-line"></i></small>
                                    <span class="circle bgl-primary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h3 class="fs-18 text-black">Recent Property</h3>
                                </div>
                                <div class="card-body">
                                    <div class="testimonial-one owl-carousel">
                                        @foreach($properties as $property)
                                        <div class="items">
                                            <a href="{{ route('view_property', $property->id) }}"><img src="{{ asset('property_images/' . $property->property_image) }}" alt="#" class="w-100 mw-100 mb-3 rounded"></a>
                                            <h5 class="fs-16 font-w600 mb-0"><a href="{{ route('view_property', $property->id) }}" class="text-black">{{ $property->title }}</a></h5>
                                            <span class="fs-14 d-block mb-4">{{ $property->location->address }}, {{ $property->location->city }} , {{ $property->location->state }}</span>
                                            <a href="javascript:void(0);" class="bgl-primary text-black p-1 ps-2 pe-2 me-3 font-w600 rounded">
                                                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <text x="0" y="15" font-family="Arial, sans-serif" font-size="15" fill="#3B4CB8">₦</text>
                                                </svg>
                                                {{ number_format($property->price) }}
                                            </a>

                                            <p class="fs-14 mt-3 mb-0">{{ $property->description }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--*********************************
            Content body end
        ***********************************-->
        <style>
            .items img {
                height: 500px;
                object-fit: cover;
            }
        </style>

        @endsection
