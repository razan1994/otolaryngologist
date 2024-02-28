<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('super_admin.dashboard') }}" title="Dashboard">
                <span class="brand-name text-truncate"> Smarzone Dashboard </span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('super_admin.dashboard') }}">
                        <i class="mdi mdi-desktop-mac-dashboard"></i>
                        <span class="nav-text" style="font-size: 9pt;">Dashboard
                        </span>
                    </a>
                </li>
                    {{-- Website Layout --}}
                    <li class="has-sub active expand">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#job"
                            aria-expanded="false" aria-controls="job">
                            <i class="fas fa-briefcase"></i>
                            <span class="nav-text" style="font-size: 9pt;"> Website Layout </span> <b
                                class="caret"></b>
                        </a>
                        <ul class="collapse" id="job" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                    <li class="active">
                                        <a class="sidenav-item-link" href="{{ route('super_admin.about_us-index') }}">
                                            <span class="nav-text" style="font-size: 9pt;">About Us </span>
                                        </a>
                                    </li>

                            </div>

                            {{-- <div class="sub-menu">
                                    <li class="active">
                                        <a class="sidenav-item-link" href="{{ route('super_admin.sliders-index') }}">
                                            <span class="nav-text" style="font-size: 9pt;">Slider</span>
                                        </a>
                                    </li>

                            </div> --}}
                        <div class="sub-menu">
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.blogs-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;">Blogs</span>
                                </a>
                            </li>
                    </div>
                        </ul>
                    </li>
                    {{-- Contact Us --}}
                    <li class="has-sub active expand">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#contactUs" aria-expanded="false" aria-controls="contactUs">
                            <i class="fas fa-id-card"></i>
                            <span class="nav-text" style="font-size: 9pt;"> Contact Us</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="contactUs" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                     <li class="active">
                                        <a class="sidenav-item-link"
                                            href="{{ route('super_admin.contact_us-index') }}">
                                            <span class="nav-text" style="font-size: 9pt;">Contact Us Info</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a class="sidenav-item-link"
                                            href="{{ route('super_admin.contact_us-requests') }}">
                                            <span class="nav-text">Contact Messages</span>
                                        </a>
                                    </li>
                            </div>
                        </ul>
                    </li>
                   {{-- SEO Operation --}}
                    @if(Auth::user()->id == 1)
                    <li class="has-sub active expand">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#seoOperations" aria-expanded="false" aria-controls="seoOperations">
                            <i class="fas fa-id-card"></i>
                            <span class="nav-text" style="font-size: 9pt;">SEO Operations</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="seoOperations" data-parent="#sidebar-menu">
                            <div class="sub-menu">


                                    <li class="active">
                                        <a class="sidenav-item-link"
                                            href="{{ route('super_admin.seo_operations-index') }}">
                                            <span class="nav-text" style="font-size: 9pt;">Main Pages</span>
                                        </a>
                                    </li>



                            </div>
                        </ul>
                    </li>
                    @endif
                    {{-- services --}}
                    <li class="has-sub active expand">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                            data-target="#services" aria-expanded="false" aria-controls="services">
                            <i class="fas fa-id-card"></i>
                            <span class="nav-text" style="font-size: 9pt;"> Home</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="services" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                    
                                     <li class="active">
                                        <a class="sidenav-item-link"
                                            href="{{ route('super_admin.treatments-index') }}">
                                            <span class="nav-text" style="font-size: 9pt;">Treatments </span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a class="sidenav-item-link" href="{{ route('super_admin.privacy_policies-index') }}">
                                            <i class="fas fa-briefcase"> </i>
                                            <span class="nav-text" style="font-size: 9pt;"> Privacy Policy</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a class="sidenav-item-link" href="{{ route('super_admin.faqs-index') }}">
                                            <i class="fas fa-briefcase"> </i>
                                            <span class="nav-text" style="font-size: 9pt;"> FAQ</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a class="sidenav-item-link"
                                            href="{{ route('super_admin.term&condition-index') }}">
                                            <span class="nav-text" style="font-size: 9pt;">Terms & Conditions </span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a class="sidenav-item-link" href="{{ route('super_admin.insurances-index') }}">
                                            <i class="fas fa-briefcase"> </i>
                                            <span class="nav-text" style="font-size: 9pt;"> Insurances</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a class="sidenav-item-link" href="{{ route('super_admin.photos-index') }}">
                                            <i class="fas fa-briefcase"> </i>
                                            <span class="nav-text" style="font-size: 9pt;"> Galary</span>
                                        </a>
                                    </li>
                            </div>
                        </ul>
                    </li>
                    {{-- Support Tickets --}}
                    <li class="active">
                        <a class="sidenav-item-link" href="{{ route('super_admin.support_tickets-index') }}">
                            <i class="mdi mdi-settings-outline"></i>
                            <span class="nav-text" style="font-size: 9pt;">Support Tickets</span>
                        </a>
                    </li>

                {{-- Logout : --}}
                <li class="active">
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
