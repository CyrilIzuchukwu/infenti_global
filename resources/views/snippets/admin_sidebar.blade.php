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
                    <li><a href="property-list.html">House Property</a></li>
                    <li><a href="property-list.html">Land Property</a></li>
                </ul>
            </li>

            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-boxes-stacked"></i>
                    <span class="nav-text">Property on sell</span>
                </a>
            </li>

            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-stack-exchange"></i>
                    <span class="nav-text">Property on rent</span>
                </a>
            </li>

            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-notification"></i>
                    <span class="nav-text">Notification</span>
                </a>
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
