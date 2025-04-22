<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar">
        <!-- Application Brand -->
        <div class="app-brand">
            <a href="{{ route('super_admin.dashboard') }}" title="Dashboard">
                <span class="brand-name text-truncate"> Dashboard </span>
            </a>
        </div>

        <!-- Sidebar Scrollbar -->
        <div class="sidebar-scrollbar">
            <ul class="nav sidebar-inner" id="sidebar-menu">

                {{-- Dashboard --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('super_admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text" style="font-size: 9pt;">Dashboard</span>
                    </a>
                </li>

                {{-- Website Layout Section --}}
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#homeSection"
                        aria-expanded="false" aria-controls="homeSection">
                        <i class="fas fa-home"></i>
                        <span class="nav-text" style="font-size: 9pt;">Website Layout</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="homeSection" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.about_us-index') }}"><span class="nav-text">About Us</span></a></li>
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.treatments-index') }}"><span class="nav-text">Treatments</span></a></li>
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.photos-index') }}"><span class="nav-text">Gallery</span></a></li>
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.faqs-index') }}"><span class="nav-text">FAQ</span></a></li>
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.privacy_policies-index') }}"><span class="nav-text">Privacy Policy</span></a></li>
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.term&condition-index') }}"><span class="nav-text">Terms & Conditions</span></a></li>

                        </div>
                    </ul>
                </li>

                {{-- Website Layout --}}
                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#websiteLayout"
                        aria-expanded="false" aria-controls="websiteLayout">
                        <i class="fas fa-layer-group"></i>
                        <span class="nav-text" style="font-size: 9pt;">Website Layout</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="websiteLayout" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.about_us-index') }}"><span class="nav-text">About Us</span></a></li>
                        </div>
                    </ul>
                </li> --}}

                {{-- Blogs --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('super_admin.blogs-index') }}">
                        <i class="fas fa-blog"></i>
                        <span class="nav-text" style="font-size: 9pt;">Blogs</span>
                    </a>
                </li>

                {{-- Contact Us --}}
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#contactUs" aria-expanded="false" aria-controls="contactUs">
                        <i class="fas fa-envelope"></i>
                        <span class="nav-text" style="font-size: 9pt;">Contact Us</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="contactUs" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.contact_us-index') }}"><span class="nav-text">Contact Us Info</span></a></li>
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.contact_us-requests') }}"><span class="nav-text">Contact Messages</span></a></li>
                        </div>
                    </ul>
                </li>

                {{-- SEO Operation --}}
                @if(Auth::user()->id == 1)
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#seoOperations" aria-expanded="false" aria-controls="seoOperations">
                        <i class="fas fa-search"></i>
                        <span class="nav-text" style="font-size: 9pt;">SEO Operations</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="seoOperations" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li><a class="sidenav-item-link" href="{{ route('super_admin.seo_operations-index') }}"><span class="nav-text">Main Pages</span></a></li>
                        </div>
                    </ul>
                </li>
                @endif

                {{-- Support Tickets --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('super_admin.support_tickets-index') }}">
                        <i class="fas fa-life-ring"></i>
                        <span class="nav-text" style="font-size: 9pt;">Support Tickets</span>
                    </a>
                </li>

                {{-- Logout --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout"></i>
                        <span class="nav-text" style="font-size: 9pt;">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
    </div>
</aside>
