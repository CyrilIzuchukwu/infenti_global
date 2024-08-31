<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <!-- Hamburger -->
    <link rel="stylesheet" href="{{ asset('assets/css/hamburger.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/properties.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Document</title>
</head>

<body>
    <!-- <section class="preLoader">
        <div class="loader"></div>
    </section> -->
    <main class="genContainer">
        <section class="hero-section">

            @include('snippets.header')

            <div class="similar">
                <img src="{{ asset('assets/img/house4.jpg') }}" alt="">
                <h1>Properties</h1>
                <h4>Property Details</h4>
            </div>



        </section>
        <section class="prop-details">
            <div class="prop-details-top">

                <div class="prop-details-text">

                    <p class="main-text">
                        {{ $data->title }}
                    </p>
                    <p><i class="ph ph-map-pin map"></i> {{ $data->location['address'] }}, {{ $data->location['city'] }} , {{ $data->location['state'] }}</p>
                    <div style="flex-wrap: wrap;">
                        <p class="price">&#8358;{{ number_format($data->price) }}</p>
                        @if($data->property_type == "house")
                        <p><i class="ph ph-bed"></i>{{ $data->details['beds'] }} Bedroom</p>
                        <p><i class="ph ph-bathtub"></i> {{ $data->details['baths'] }} Bathroom</p>
                        @else
                        @endif
                        <p><i class="ph ph-cards"></i> {{ number_format($data->details['sqfeets']) }} Square feets </p>

                    </div>
                </div>

                <div class="buy-button">

                    <a href="javascript:void(0);">For {{ ucfirst($data->property_status) }}</a>
                </div>
            </div>
            <div class="prop-details-bottom">
                <div class="prop-details-layout">
                    <div class="prop-details-img spanned">
                        <img src="{{ asset('property_images/' . $data->property_image) }}" alt="">
                    </div>


                    @if(!empty($data->related_images))
                    <div class="prop-details-img ">
                        @foreach($data->related_images as $image)
                        <div class="img-wrapperm">
                            <img src="{{ asset('related_images/' . $image) }}" alt="">
                        </div>
                        @endforeach
                    </div>

                    @endif
                </div>


                <div class="prop-description">
                    <h2>Property Description</h2>

                    <p style="line-height: 25px;">{!! $data->description !!}</p>
                </div>
                <div class="prop-overview">
                    @if($data->property_type == "house")
                    <div>
                        <img src="{{ asset('assets/img/prop bed.svg') }}" alt="">
                        <p>Rooms <br> {{ $data->details['beds'] }} </p>
                    </div>
                    <div>
                        <img src="{{ asset('assets/img/prop bath.svg') }}" alt="">
                        <p>Bathrooms <br> {{ $data->details['baths'] }}</p>
                    </div>

                    <div>
                        <img src="{{ asset('assets/img/prop calendar.svg') }}" alt="">
                        <p>Year Built <br>{{ $data->details['year_built'] }}</p>
                    </div>
                    @else
                    @endif
                    <div>
                        <img src="{{ asset('assets/img/prop garage.svg') }}" alt="">
                        <p>Square Feet <br>{{ number_format($data->details['sqfeets']) }}</p>
                    </div>


                </div>
            </div>
            @if($data->property_type == "house")
            <div class="amenities">
                <h3>Ammenities</h3>
                <div class="others">
                    @if($data->additional_features)
                    @foreach($data->additional_features as $feature)
                    <div>
                        <img src="{{ asset('assets/img/check_circle.svg') }}" alt="">
                        <p>{{ ucfirst($feature) }}</p>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            @else
            @endif

        </section>
        @include('snippets.footer')
    </main>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://unpkg.com/sal.js@0.8.2/dist/sal.js"></script>
</body>

</html>
