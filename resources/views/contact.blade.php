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
                <h1>Contacts</h1>
            </div>

        </section>
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
                    <!-- <div class="agree">
                        <input type="checkbox" name="check" id="check">
                        <label for="check">You agree to our friendly privacy policy.</label>
                        <div class="error-message" id="checkError"></div>
                    </div> -->
                    <button style="cursor: pointer;" type="submit">Send Message</button>
                </form>
            </main>
            <aside>
                <img src="{{ asset('assets/img/Image.svg') }}" alt="">
            </aside>
        </section>

        <section class="locate-us">
            <div class="locate-text">
                <h4 class="locate">Locate us At <i class="ri-direction-fill"></i></h4>
                <h6>Ifeneti <span>Global</span> Services LTD</h6>
                <p>Kenkolly’s Plaza No.9 Club Road, Formally Abakaliki Street Awka, Anambra State, Nigeria.</p>
            </div>
            <div class="locate-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31730.494705017314!2d7.019424810839856!3d6.222549300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104383598b0faa7f%3A0xbecad229fc9d96a9!2sOdogwu%20Plaza!5e0!3m2!1sen!2sng!4v1721054871173!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        @include('snippets.footer')
    </main>


    <script src="assets/js/script.js"></script>
    <!-- <script src="assets/js/validation.js"></script> -->
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

</body>

</html>
