<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Ifenti Global Service Admin Dashboard</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta property="og:image" content="social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_assets/images/favicon.png') }}">





    <link href="{{ asset('admin_assets/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">


    <!-- import  -->
    <link rel="stylesheet" href="{{ asset('admin_assets/icons/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/icons/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/icons/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/icons/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/icons/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/icons/avasta/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/icons/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/icons/flaticon-1/font/flaticon-1.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/metismenu/css/metisMenu.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

</head>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>


    <!-- Main wrapper start -->
    <div id="main-wrapper">


        <!-- Nav header start -->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('admin_assets/images/logo.png') }}" alt="/">
                <!-- <h6 class="logo-compact">Ifeneti</h6> -->
                <img class="brand-title" src="{{ asset('admin_assets/images/logo-text.png') }}" alt="/">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!-- Nav header end  -->


        @include('snippets.admin_header')



        @include('snippets.admin_sidebar')


        <div class="content-body">
            @yield('content')
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright © <a href="" target="_blank">Infeneti Global</a> 2024</p>
            </div>
        </div>
    </div>
    <!--Main wrapper ends-->


    <script src="{{ asset('admin_assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/chartjs/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/owl-carousel/owl.carousel.js') }}"></script>



    <script src="{{ asset('admin_assets/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/deznav-init.js') }}"></script>
    <!-- Dashboard 1 -->



    <script>
        function carouselReview() {
            /*  testimonial one function by = owl.carousel.js */
            jQuery('.testimonial-one').owlCarousel({
                loop: true,
                autoplay: true,
                margin: 0,
                nav: true,
                dots: false,
                navText: ['<i class="las la-long-arrow-alt-left"></i>', '<i class="las la-long-arrow-alt-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 1
                    },

                    767: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
            /*Custom Navigation work*/
            jQuery('#next-slide').on('click', function() {
                $('.testimonial-one').trigger('next.owl.carousel');
            });

            jQuery('#prev-slide').on('click', function() {
                $('.testimonial-one').trigger('prev.owl.carousel');
            });
            /*Custom Navigation work*/
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                carouselReview();
            }, 1000);
        });
    </script>



    <!-- Summernote CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->

    <!-- Summernote JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Property Description',
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onPaste: function(e) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        document.execCommand('insertText', false, bufferText);
                    }
                },
                styleTags: ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'ol', 'ul']
            });
        });
    </script>


    <!-- sweet alert  -->
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

</body>


</html>
