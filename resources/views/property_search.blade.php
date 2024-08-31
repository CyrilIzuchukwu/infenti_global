<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>

<body>
    <section class="preLoader">
        <div class="loader"></div>
    </section>
    <main class="genContainer">
        <section class="hero-section">
            @include('snippets.header')

            <div class="similar">
                <img src="{{ asset('assets/img/house4.jpg') }}" alt="">
                <h1>Properties</h1>
            </div>



        </section>
        <section class="property-page">

            <div class="property-grid-cards">
                @if($searched_properties->isEmpty())
                <div class="no-properties" style="width: 100%; ">
                    <p style="color: red; text-align: center;">No properties found for your search criteria.</p>
                </div>
                @else
                @foreach($searched_properties as $property)
                <div class="card">
                    <div class="card-img">
                        <img src="{{ asset('property_images/' . $property->property_image) }}" alt="">
                    </div>
                    <div class="card-text">
                        <p class="main-text">
                            <a href="{{ route('property_details', $property->id) }}">{{ $property->title }}</a>
                        </p>
                        <p><i class="ph ph-map-pin"></i> {{ $property->location->city }} , {{ $property->location->state }}</p>
                        <div>
                            <p class="price">&#8358;{{ number_format($property->price) }}</p>
                            @if($property->property_type == "house")
                            <p><i class="ph ph-bed"></i> {{ $property->details->beds }}</p>
                            <p><i class="ph ph-bathtub"></i> {{ $property->details->baths }} </p>
                            @else

                            @endif
                            <p><i class="ph ph-cards"></i> {{ number_format($property->details->sqfeets) }} Sq fts</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="pagination">
                @if ($all_properties->onFirstPage())
                <button class="page-link disabled" id="prevPage"><i class="ri-arrow-left-line"></i></button>
                @else
                <a href="{{ $all_properties->previousPageUrl() }}" class="page-link" id="prevPage"><i class="ri-arrow-left-line"></i></a>
                @endif

                <div class="page-info" id="pageInfo">
                    @foreach ($all_properties->getUrlRange(1, $all_properties->lastPage()) as $page => $url)
                    @if ($page == $all_properties->currentPage())
                    <a href="{{ $url }}" class="active">{{ $page }}</a>
                    @else
                    <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                    @endforeach
                    @if ($all_properties->hasMorePages())
                    <a href="{{ $all_properties->nextPageUrl() }}" class="page-link" id="nextPage"><i class="ri-arrow-right-line active"></i></a>
                    @else
                    <button class="page-link disabled" id="nextPage"><i class="ri-arrow-right-line active"></i></button>
                    @endif
                </div>
            </div>
        </section>
        @include('snippets.footer')
    </main>



    <script src="assets/js/script.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
    <script>
        const hamburger = document.querySelector(".hamburger");
        const navSlide = document.querySelector('.nav-slide');
        // On click
        hamburger.addEventListener("click", function() {
            // Toggle class "is-active"
            hamburger.classList.toggle("is-active");
            // Do something else, like open/close menu
            navSlide.classList.toggle('slide')
        });
    </script>
    <style>
        .pagination {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-link {
            background-color: #f4f4f4;
            margin: 0 5px;
            cursor: pointer;
            text-align: center;
        }

        .page-link.disabled {
            cursor: not-allowed;
            opacity: 0.5;
        }

        .page-info a {
            text-decoration: none;
            color: #333;
            padding: 10px;
        }

        .page-info a.active {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</body>

</html>
