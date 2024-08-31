<!DOCTYPE html>
<html lang="en">

<head>
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
                <h1>About Us</h1>
            </div>

        </section>


        <section class="about aboutuspage">
            <main>
                <h1>
                    <hr class="left"> <i class="ri-arrow-left-s-fill"></i> About Us <i class="ri-arrow-right-s-fill"></i>
                    <hr class="right">
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur. Amet risus rhoncus sodales vulputate arcu. Erat mi dolor vitae in. Consequat pellentesque sed vitae purus erat id in pretium. Sed cras fringilla lacinia tortor diam pretium. Ipsum amet faucibus tortor vulputate elementum tortor et dis pharetra. Rutrum amet diam pretium imperdiet elit sit.</p>
                <p>Lorem ipsum dolor sit amet consectetur. Amet risus rhoncus sodales vulputate arcu. Erat mi dolor vitae in. Consequat pellentesque sed vitae purus erat id in pretium. Sed cras fringilla lacinia tortor diam pretium. Ipsum amet faucibus tortor vulputate elementum tortor et dis pharetra. Rutrum amet diam pretium imperdiet elit sit.Lorem ipsum dolor sit amet consectetur. </p>

            </main>
            <aside>
                <img src="{{ asset('assets/img/house4.jpg') }}" alt="">
            </aside>
        </section>
        <section class="mission">
            <div class="mission-img">
                <img src="{{ asset('assets/img/rafiki.svg') }}" alt="">

            </div>
            <div class="mission-text">
                <h1>
                    <hr class="left"> <i class="ri-arrow-left-s-fill"></i> Our Mission <i class="ri-arrow-right-s-fill"></i>
                    <hr class="right">
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur. Amet risus rhoncus sodales vulputate arcu. Erat mi dolor vitae in. Consequat pellentesque sed vitae purus erat id in pretium. Sed cras fringilla lacinia tortor diam pretium. Ipsum amet faucibus tortor vulputate elementum tortor et dis pharetra. Rutrum amet diam pretium imperdiet elit sit.</p>
                <p>Lorem ipsum dolor sit amet consectetur. Amet risus rhoncus sodales vulputate arcu. Erat mi dolor vitae in. Consequat pellentesque sed vitae purus erat id in pretium. Sed cras fringilla lacinia tortor diam pretium. Ipsum amet faucibus tortor vulputate elementum tortor et dis pharetra. Rutrum amet diam pretium imperdiet elit sit.Lorem ipsum dolor sit amet consectetur. </p>
            </div>
        </section>
        <section class="vision">

            <div class="mission-text">
                <h1>
                    <hr class="left"> <i class="ri-arrow-left-s-fill"></i> Our Vision <i class="ri-arrow-right-s-fill"></i>
                    <hr class="right">
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur. Amet risus rhoncus sodales vulputate arcu. Erat mi dolor vitae in. Consequat pellentesque sed vitae purus erat id in pretium. Sed cras fringilla lacinia tortor diam pretium. Ipsum amet faucibus tortor vulputate elementum tortor et dis pharetra. Rutrum amet diam pretium imperdiet elit sit.</p>
                <p>Lorem ipsum dolor sit amet consectetur. Amet risus rhoncus sodales vulputate arcu. Erat mi dolor vitae in. Consequat pellentesque sed vitae purus erat id in pretium. Sed cras fringilla lacinia tortor diam pretium. Ipsum amet faucibus tortor vulputate elementum tortor et dis pharetra. Rutrum amet diam pretium imperdiet elit sit.Lorem ipsum dolor sit amet consectetur. </p>
            </div>
            <div class="mission-img">
                <img src="{{ asset('assets/img/bro.svg') }}" alt="">

            </div>
        </section>

        @include('snippets.footer')
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/script.js"></script>
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
    <script src="assets/js/validation.js"></script>
</body>

</html>