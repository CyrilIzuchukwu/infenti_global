    <!-- Laptop view -->
    <nav class="nav-bar">
        <div class="nav-top">
            <a href="tel:+234 8036 645 193"><i class="ph ph-phone-call"></i> +234 8036 645 193</a>
            <a href="tel:+234 8188 669 563"><i class="ph ph-phone-call"></i> 234 8188 669 563</a>
            <a href="mailto:ifentiglobal@gmail.com"><i class="ph ph-envelope-simple"></i>
                Ifeneti4422@gmail.com</a>

        </div>
        <div class="nav-bottom">
            <div class="nav-logo">
                <h1>Ifeneti <span>Global</span></h1>
            </div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('properties') }}">Properties</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
            </ul>
            <div style="display: flex; align-items: center; gap: 6px;">
                <a href="/contact" class="getintouch-link">Get In touch</a>

                @auth
                @if(Auth::user()->role_as == 0)
                <li><a class="getintouch-link" href="">Dashboard</a></li>
                @elseif(Auth::user()->role_as == 2)
                <li><a class="getintouch-link" href="{{ route('agent_dashboard') }}">Dashboard</a></li>
                @elseif(Auth::user()->role_as == 1)
                <a href="{{ route('admin_dashboard') }}" class="getintouch-link">Dashboard</a>
                @endif

                @endauth

            </div>
        </div>
    </nav>

    <nav class="nav-bar-mobile">

        <div class="nav-bottom">


            <div class="nav-logo">
                <h1>Ifenti <span>Global</span></h1>
            </div>
            <div class="nav-slide">
                <ul class="nav-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/properties">Properties</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
                <div class="nav-top">
                    <a href="tel:+234 8036 645 193"><i class="ph ph-phone-call"></i> +234 8036 645 193</a>
                    <a href="tel:+234 8188 669 563"><i class="ph ph-phone-call"></i> 234 8188 669 563</a>
                    <a href="mailto:ifentiglobal@gmail.com"><i class="ph ph-envelope-simple"></i>
                        Ifeneti4422@gmail.com</a>

                </div>
            </div>

            <div class="hamburger hamburger--elastic">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>


        </div>
    </nav>
