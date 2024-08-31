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
        </section>

        @yield('content')

        @include('snippets.footer')
        <div class="scroll-top">
            <i class="ri-arrow-up-line"></i>
        </div>
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



    <!-- sweet alert  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('message'))
    <script>
        swal("Successful!", "{{ session('message') }}!", "success");
    </script>
    @endif
    @if(session('error')) < script>
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
</body>

</html>
