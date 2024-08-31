<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a href="{{ route('admin_dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-dashboard-1"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-user-7"></i>
                    <span class="nav-text">Agents</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add_agent') }}">Add Agent</a></li>
                    <li><a href="{{ route('all_agents') }}">All Agents</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Property</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add_property') }}">Add Property</a></li>
                    <li><a href="{{ route('property_list') }}">All Property List</a></li>
                </ul>
            </li>

            <li><a href="{{ route('inquiry') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-notification"></i>
                    <span class="nav-text">Notification</span>
                </a>
            </li>

            <li class="">
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-landing-page"></i>
                    <span class="nav-text">Testimonials</span>
                </a>

                <ul aria-expanded="false" class="mm-collapse" >
                    <li><a href="{{ route('add_testimonial') }}">Add Testimonials</a></li>
                    <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                </ul>
            </li>


            <li><a href="{{ route('FAQs') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-person-circle-question"></i>
                    <span class="nav-text">FAQs</span>
                </a>
            </li>





            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-sign-out"></i>
                    <span class="nav-text">Logout</span>
                </a>
                <form action="{{ route('logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
            </li>


        </ul>
    </div>
</div>
