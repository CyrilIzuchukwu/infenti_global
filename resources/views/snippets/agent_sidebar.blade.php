<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a href="{{ route('agent_dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-dashboard-1"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Property</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('agent_add_property') }}">Add Property</a></li>
                    <li><a href="{{ route('agent_property_list') }}">Property List</a></li>
                </ul>
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
