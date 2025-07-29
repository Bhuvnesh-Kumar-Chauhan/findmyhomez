<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="{{ URL::asset('build/images/users/avatar-7.jpg') }}" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">Bhuvnesh</h5>
                    <span class="font-size-13 text-white-50">Administrator</span>
                </div>
            </div>
        </div>



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="dripicons-home"></i><span class="badge rounded-pill bg-info float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>


                {{-- Sliders --}}
                <li>
                    <a href="{{ route('admin.sliders.index') }}" class="waves-effect">
                        <i class="fas fa-sliders-h"></i>
                        <span>Home Sliders</span>
                    </a>
                </li>

                {{-- Property --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-home"></i>
                        <span>Property</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.property_types.index') }}">Property Type</a></li>
                        <li><a href="{{ route('admin.property_statuses.index') }}">Property Status</a></li>
                        <li><a href="{{ route('admin.properties.index') }}">Properties</a></li>
                    </ul>
                </li>

                {{-- Service --}}
                <li>
                    <a href="{{ route('admin.services.index') }}" class="waves-effect">
                        <i class="fas fa-concierge-bell"></i>
                        <span>Service</span>
                    </a>
                </li>

                {{-- Team Member (Agent) --}}
                <li>
                    <a href="{{ route('admin.team-members.index') }}" class="waves-effect">
                        <i class="fas fa-users"></i>
                        <span>Team Member</span>
                    </a>
                </li>

                {{-- Testimonials --}}
                <li>
                    <a href="{{ route('admin.testimonials.index') }}" class="waves-effect">
                        <i class="fas fa-quote-left"></i>
                        <span>Testimonials</span>
                    </a>
                </li>
                {{-- Subscriber --}}
                <li>
                    <a href="{{ route('admin.subscribers.index') }}" class="waves-effect">
                        <i class="fas fa-users"></i>
                        <span>Subscribers</span>
                    </a>
                </li>

                {{-- Blog --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-tags"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.blog-categories.index') }}">Blog Category</a></li>
                        <li><a href="{{ route('admin.blogs.index') }}">Blog</a></li>
                    </ul>
                </li>

                {{-- settings --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-cog-outline font-size-20"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.countries.index') }}">Country</a></li>
                        <li><a href="{{ route('admin.states.index') }}">State</a></li>
                        <li><a href="{{ route('admin.cities.index') }}">City</a></li>
                        <li><a href="{{ route('admin.settings.index') }}">General Settings</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
