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
                <h1>Login</h1>
            </div>

        </section>
        <section class="get-in-touch" data-sal="slide-up" data-sal-duration="1000">
            <main>
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div style="margin-bottom: 1rem;">
                        <label for="email">Email</label>
                        <input style="margin-bottom: 0px;" type="email" name="email" id="email" placeholder="you@gmail.com" value="{{ old('email') }}" required autocomplete="email" autofocus class=" @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" style="color:red; font-size: 12px;">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label for="password">Password</label>
                        <input style="margin-bottom: 0px;" type="password" name="password" id="password" placeholder="**********" class=" @error('password') is-invalid @enderror" required>
                        @error('password')
                        <span class="invalid-feedback" style="color:red; font-size: 12px;">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <button style="margin-top: 10px;" type="submit">Submit</button>
                </form>
            </main>
            <aside>
                <!-- <img src="{{ asset('assets/img/login.jpg') }}" alt=""> -->
            </aside>
        </section>


        @include('snippets.footer')
    </main>


    <script src="assets/js/script.js"></script>
    <script src="assets/js/validation.js"></script>
</body>

</html>
