<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/sal.js@0.8.2/dist/sal.css">

    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    <!-- Hamburger -->
    <link rel="stylesheet" href="{{ asset('assets/css/hamburger.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">
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

            <div class="hero">

                <main class="hero-text-main" data-sal="slide-right" data-sal-duration="1000">
                    <h1>Your <span>Property</span> , Our Priority.</h1>
                    <p>The <span> #1 </span> site property dealers trust* <br> Let’s Find your <span>Dream
                            Property</span> </p>


                    <a href="/properties">Explore <i class="ph ph-arrow-right"></i></a>
                </main>
                <div class="swiper" data-sal="slide-left" data-sal-duration="1000">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/img/house1.jpg') }}" alt="">
                        </div>
                        <div class="swiper-slide"><img src="{{ asset('assets/img/house2.jpg') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('assets/img/house3.jpg') }}" alt=""></div>

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> -->

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>

                <div class="searchProperty">
                    <p>Search</p>

                    <form action="{{ route('property.search') }}" method="GET" class="lower-search">
                        <div>
                            <label for="city">Location</label>
                            <select name="city" id="city">
                                <option value="" disabled selected>Select State</option>
                                @foreach($states as $state)
                                <option value="{{ $state->name }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="property">Property Type</label>
                            <select name="property" id="property">
                                <option value="" disabled selected>Select Property Type</option>
                                <option value="land">Land</option>
                                <option value="house">House</option>
                            </select>
                        </div>
                        <div>
                            <label for="price">Price Range</label>
                            <select name="price" id="price">
                                <option value="" disabled selected>Select Price Range</option>
                                <option value="0-5000000">Below N5 million</option>
                                <option value="5000000-10000000">N5-10 million</option>
                                <option value="10000000-20000000">N10-20 million</option>
                                <option value="20000000-50000000">N20-50 million</option>
                                <option value="50000000-100000000">N50-100 million</option>
                                <option value="100000000-150000000">N100-150 million</option>
                                <option value="150000000-200000000">N150-200 million</option>
                                <option value="200000000+">Above N200 million</option>
                            </select>

                        </div>
                        <button type="submit">Search</button>
                    </form>

                </div>
            </div>



        </section>
        <section class="category">
            <h2>Featured Categories</h2>
            <div class="cards">
                <div class="card" data-sal="slide-up" data-sal-duration="1000">
                    <div class="card-img">
                        <img src="{{ asset('assets/img/land2.svg') }}" alt="">
                    </div>
                    <h4>Land</h4>
                    <p>Lorem ipsum adipisicing elit. Molestias, commodi.</p>
                </div>
                <div class="card" data-sal="slide-down" data-sal-duration="1000">
                    <div class="card-img">
                        <img src="{{ asset('assets/img/homeicon.svg') }}" alt="">
                    </div>
                    <h4>Homes</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, commodi.</p>
                </div>
                <div class="card" data-sal="slide-up" data-sal-duration="1000">
                    <div class="card-img">
                        <img src="{{ asset('assets/img/buildingicon.svg') }}" alt="">
                    </div>
                    <h4>Building</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, commodi.</p>
                </div>
            </div>
        </section>
        <section class="properties" data-sal="slide-up" data-sal-duration="1000">
            <h2>Featured Properties</h2>
            <div class="layouts">


                @if($featured_property1)
                <a href="{{ route('property_details', $featured_property1->id) }}" class="layout layout-span">
                    <div class="prop-img">
                        <img src="{{ asset('property_images/' . $featured_property1->property_image) }}" alt="">
                    </div>
                    <div class="overlay">
                        <div class="ctas">
                            <div class="status">
                                <p>FOR {{ strtoupper($featured_property1->property_status) }}</p>
                                <p>{{ strtoupper($featured_property1->property_type) }}</p>
                            </div>
                            <p><i class="ph ph-arrow-up-right"></i></p>
                        </div>
                        <div class="prop-text">
                            <h3>{{ $featured_property1->title }}</h3>
                            <p><i class="ph ph-map-pin"></i>{{ $featured_property1->location->address }} {{ $featured_property1->location->city }}, {{ $featured_property1->location->state }}</p>
                            <div>
                                <p class="price">&#8358;{{ number_format($featured_property1->price) }}</p>
                                @if($featured_property1->property_type == "house")
                                <p><i class="ph ph-bed"></i> {{ $featured_property1->details->beds }}</p>
                                <p><i class="ph ph-bathtub"></i> {{ $featured_property1->details->baths }}</p>
                                @endif
                                <p><i class="ph ph-cards"></i>{{ number_format($featured_property1->details->sqfeets) }} Sq fts</p>
                            </div>
                        </div>
                    </div>
                </a>
                @else
                <div class="empty-property"></div>
                @endif




                @if($featured_property2->isEmpty())
                <div class="empty-property"></div>
                @else
                @foreach($featured_property2 as $property)
                <a href="{{ route('property_details', $property->id) }}">
                    <div class="layout">
                        <div class="prop-img">
                            <img src="{{ asset('property_images/' . $property->property_image) }}" alt="">
                        </div>
                        <div class="overlay">
                            <div class="ctas">
                                <div class="status">
                                    <p>FOR {{ strtoupper($property->property_status) }}</p>
                                    <p>{{ strtoupper($property->property_type) }}</p>
                                </div>
                                <p><i class="ph ph-arrow-up-right"></i></p>
                            </div>
                            <div class="prop-text">
                                <h3>{{ $property->title }}</h3>
                                <p><i class="ph ph-map-pin"></i>{{ $property->location->address }} {{ $property->location->city }}, {{ $property->location->state }}</p>
                                <div>
                                    <p class="price">&#8358;{{ number_format($property->price) }}</p>
                                    @if($property->property_type == "house")
                                    <p><i class="ph ph-bed"></i> {{ $property->details->beds }}</p>
                                    <p><i class="ph ph-bathtub"></i> {{ $property->details->baths }}</p>
                                    @endif
                                    <p><i class="ph ph-cards"></i>{{ number_format($property->details->sqfeets) }} Sq fts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif

            </div>
        </section>
        <section class="about" data-sal="slide-up" data-sal-duration="1000">
            <main>
                <h1>
                    <hr class="left"> <i class="ri-arrow-left-s-fill"></i> About Us <i class="ri-arrow-right-s-fill"></i>
                    <hr class="right">
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur. Amet risus rhoncus sodales vulputate arcu. Erat mi dolor
                    vitae in. Consequat pellentesque sed vitae purus erat id in pretium. Sed cras fringilla lacinia
                    tortor diam pretium. Ipsum amet faucibus tortor vulputate elementum tortor et dis pharetra. Rutrum
                    amet diam pretium imperdiet elit sit.</p>
                <p>Lorem ipsum dolor sit amet consectetur. Amet risus rhoncus sodales vulputate arcu. Erat mi dolor
                    vitae in. Consequat pellentesque sed vitae purus erat id in pretium. Sed cras fringilla lacinia
                    tortor diam pretium. Ipsum amet faucibus tortor vulputate elementum tortor et dis pharetra. Rutrum
                    amet diam pretium imperdiet elit sit.Lorem ipsum dolor sit amet consectetur. </p>

                <a href="/about">Know More</a>
            </main>
            <aside>
                <img src="{{ asset('assets/img/house4.jpg') }}" alt="">
            </aside>
        </section>


        <section class="operate" data-sal="slide-up" data-sal-duration="1000">
            <h2>How We Operate</h2>
            <div class="operate-cards">
                <div class="operate-card">
                    <div class="operate-img">
                        <img src="{{ asset('assets/img/buildingicon.svg') }}" alt="">
                    </div>
                    <div class="operate-text">
                        <h6 class="number">01</h6>
                        <p class="main-text">Discover your Dream property</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, ullam!</p>
                    </div>
                </div>
                {{-- <hr> --}}
                <div class="operate-card">
                    <div class="operate-img">
                        <img src="{{ asset('assets/img/call.svg') }}" alt="">
                    </div>
                    <div class="operate-text">
                        <h6 class="number">02</h6>
                        <p class="main-text">Contact Our Team</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, ullam!</p>
                    </div>
                </div>
                {{-- <hr> --}}
                <div class="operate-card">
                    <div class="operate-img">
                        <img src="{{ asset('assets/img/calendar.svg') }}" alt="">
                    </div>
                    <div class="operate-text">
                        <h6 class="number">03</h6>
                        <p class="main-text">Schedule a Meeting</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, ullam!</p>
                    </div>
                </div>

                <div class="operate-card">
                    <div class="operate-img">
                        <img src="{{ asset('assets/img/camera.svg') }}" alt="">
                    </div>
                    <div class="operate-text">
                        <h6 class="number">04</h6>
                        <p class="main-text">Visit the Property</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, ullam!</p>
                    </div>
                </div>
                {{-- <hr> --}}
                <div class="operate-card">
                    <div class="operate-img">
                        <img src="{{ asset('assets/img/moneyicon.svg') }}" alt="">
                    </div>
                    <div class="operate-text">
                        <h6 class="number">05</h6>
                        <p class="main-text">Seal the Deal</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, ullam!</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimonials">
            <main data-sal="slide-left" data-sal-duration="1000">
                <h1>TESTIMONIALS</h1>
                <p class="look">Look What Our Customers Say!</p>
                <p>Fusce venenatis tellcelerisque, non pulvinar est pellentesqueus a felis scelerisque, non pulvinar est
                    pellentesque. Fusce venenatis tellus a felis us a felis scelerisque, non pulvinar est pellentesque.
                    Fusce venenatis .</p>

                <div class="test-arrow">
                    <i class="ri-arrow-left-line swiper-button-prev2"></i>
                    <i class="ri-arrow-right-line swiper-button-next2"></i>
                </div>
            </main>



            <!-- Slider main container -->
            <div class="swiper-test" data-sal="slide-right" data-sal-duration="1000">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <aside>
                            <div class="quote-img">
                                <img src="{{ asset('assets/img/quotes.svg') }}" alt="">
                            </div>
                            <div class="testimonial-text">
                                <p class="text">{{ $testimonial->testimonial }}</p>
                                <div class="bottom-text">
                                    <div class="avatar-img">
                                        <img src="{{ asset('client_images/' . $testimonial->client_image) }}" alt="">
                                    </div>
                                    <p>{{ $testimonial->client_name }}</p>
                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++) <i class="ri-star-fill {{ $i > $testimonial->review ? 'empty' : '' }}"></i>
                                            @endfor
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    @endforeach


                </div>
                <div class="swiper-pagination2"></div>
            </div>

        </section>
        <style>
            .stars .ri-star-fill.empty {
                color: #ddd !important;
            }
        </style>
        <section class="get-in-touch" data-sal="slide-up" data-sal-duration="1000">
            <main>
                <h2>Get in touch</h2>
                <p>Our friendly team would love to hear from you.</p>
                <form id="contactForm" method="POST" action="{{ route('make_contact') }}">
                    @csrf
                    <div class="name">
                        <div>
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="first_name" value="{{ old('first_name') }}" placeholder="first name">
                            <span style="font-size: 12px; color: red;">@error('first_name'){{ $message }} @enderror </span>
                        </div>
                        <div>
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" value="{{ old('last_name') }}" name="last_name" placeholder="last name">
                            <span style="font-size: 12px; color: red;">@error('last_name'){{ $message }} @enderror </span>
                        </div>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="you@gmail.com">
                        <span style="font-size: 12px; color: red;">@error('email'){{ $message }} @enderror </span>
                    </div>
                    <div>
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" id="phoneNumber" placeholder="+234 00 0000 0000">
                        <span style="font-size: 12px; color: red;">@error('phone'){{ $message }} @enderror </span>
                    </div>
                    <div>
                        <label for="message">Message</label>
                        <textarea name="message" id="message" placeholder="Message">{{ old('message') }}</textarea>
                        <span style="font-size: 12px; color: red;">@error('message'){{ $message }} @enderror </span>
                    </div>
                    <div class="agree">
                        <input type="checkbox" name="check" id="check">
                        <label for="check">You agree to our friendly privacy policy.</label>
                        <div class="error-message" id="checkError"></div>
                    </div>
                    <button style="cursor: pointer;" type="submit">Send Message</button>
                </form>
            </main>
            <aside>
                <img src="{{ asset('assets/img/Image.svg') }}" alt="">
            </aside>
        </section>

        <section class="faq">
            <div class="faq-test">
                <h2>Frequently Asked Questions</h2>
                <p class="faqp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias porro assumenda
                    aspernatur magnam delectus enim vero et ut minus, repellendus temporibus sunt fugit, consectetur
                    eaque
                    corporis. Excepturi dolor quod deserunt dicta magnam. Eum repudiandae numquam accusamus debitis
                    ratione
                    fugiat quia tempora at saepe placeat. Sunt impedit dignissimos laboriosam sapiente quis!
                </p>
            </div>
            <div class="faqContainer">
                @foreach($frontEndFaqs as $fqs)
                <div class="faq-item">
                    <div class="faq-question">
                        <p>{{ $fqs->question }}? </p>
                        <p><i class="ri-arrow-down-s-line"></i></p>
                    </div>
                    <div class="faq-answer">{{ $fqs->answer }}</div>
                </div>
                @endforeach
            </div>
        </section>
        @include('snippets.footer')
    </main>

    <script src="assets/js/script.js"></script>
    <script src="https://unpkg.com/sal.js@0.8.2/dist/sal.js"></script>


    <script>
        sal({
            threshold: 0.1,
        });
    </script>
    <script src="assets/js/validation.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // Autoplay settings
            autoplay: {
                delay: 1000, // Delay between slides in milliseconds

            },
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>
    <script>
        const swiper2 = new Swiper('.swiper-test', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // Autoplay settings
            autoplay: {
                delay: 5000, // Delay between slides in milliseconds

            },
            // If we need pagination
            pagination: {
                el: '.swiper-pagination2',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next2',
                prevEl: '.swiper-button-prev2',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('message'))
    <script>
        swal("Successful!", "{{ session('message') }}!", "success");
    </script>
    @endif
    @if (session('error'))
    <script>
        swal("Error!", "{{ session('error') }}!", "warning");
    </script>
    @endif
    @if (Session::has('success'))
    <script>
        swal("Successful!", "{{ Session::get('success') }}!", "success");
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        swal("Error!", "{{ Session::get('error') }}!", "warning");
    </script>
    @endif

    <!-- <script src="{{ asset('admin_assets/assets/js/jquery.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@11.1.10/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                console.log("Form Data:", formData);

                $.ajax({
                    type: 'POST',
                    url: '{{ route("make_contact") }}',
                    data: formData,
                    success: function(response) {
                        console.log("Response:", response);
                        if (response.success) {
                            swal("Successful!", response.success, "success")
                                .then((value) => {
                                    $('#contactForm').trigger('reset');
                                });
                        }
                    },
                    error: function(xhr) {
                        console.log("Error:", xhr);
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            let message = "Something went wrong.";
                            if (errors) {
                                message = Object.values(errors).map((e) => e.join('\n')).join('\n');
                            }
                            swal("Error!", message, "error");
                        } else {
                            swal("Error!", "Failed to submit. Please try again.", "error");
                        }
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                item.querySelector('.faq-question').addEventListener('click', () => {
                    const answer = item.querySelector('.faq-answer');
                    const isOpen = answer.style.display === 'block';

                    // Close all answers and remove 'active' class from all items
                    document.querySelectorAll('.faq-answer').forEach(answer => {
                        answer.style.display = 'none';
                    });
                    document.querySelectorAll('.faq-item').forEach(item => {
                        item.classList.remove('active');
                    });

                    // Toggle the clicked answer and 'active' class
                    answer.style.display = isOpen ? 'none' : 'block';
                    if (!isOpen) {
                        item.classList.add('active');
                    }
                    const arrow = document.querySelectorAll('.ri-arrow-down-s-line');
                    arrow.forEach(arr => {
                        if (!isOpen) {
                            arr.classList.toggle('active')
                        }
                    })
                });
            });
        });
    </script>
</body>

</html>
