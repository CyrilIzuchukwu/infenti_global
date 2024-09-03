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
