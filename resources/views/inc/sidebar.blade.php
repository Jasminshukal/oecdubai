@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">

                    {{-- <li class="menu {{ ($category_name === 'starter_kits') ? 'active' : '' }}">
                        <a href="#starter-kit" data-toggle="collapse" aria-expanded="{{ ($category_name === 'starter_kits') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                                <span>Starter Kit</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'starter_kits') ? 'show' : '' }}" id="starter-kit" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'blank_page') ? 'active' : '' }}">
                                <a href="/starter-kit/blank_page"> Blank Page </a>
                            </li>
                            <li class="{{ ($page_name === 'breadcrumb') ? 'active' : '' }}">
                                <a href="/starter-kit/breadcrumbs"> Breadcrumb </a>
                            </li>
                            <li class="{{ ($page_name === 'boxed') ? 'active' : '' }}">
                                <a href="/starter-kit/boxed"> Boxed </a>
                            </li>
                            <li class="{{ ($page_name === 'alt_menu') ? 'active' : '' }}">
                                <a href="/starter-kit/alternative_menu"> Alternate Menu </a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="menu {{ ($category_name === 'events') ? 'active' : '' }}">
                        <a href="{{ url('event') }}" aria-expanded="{{ ($category_name === 'events') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>{{ __('event.menu') }}</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu {{ ($category_name === 'blogs') ? 'active' : '' }}">
                        <a href="{{ url('blog') }}" aria-expanded="{{ ($category_name === 'blogs') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                <span>{{ __('blog.menu') }}</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu {{ ($category_name === 'gallery') ? 'active' : '' }}">
                        <a href="{{ url('gallery') }}" aria-expanded="{{ ($category_name === 'gallery') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-film"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="7" y2="7"></line><line x1="2" y1="17" x2="7" y2="17"></line><line x1="17" y1="17" x2="22" y2="17"></line><line x1="17" y1="7" x2="22" y2="7"></line></svg>
                                <span>{{ __('gallery.menu') }}</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu {{ ($category_name === 'university') ? 'active' : '' }}">
                        <a href="{{ route('university.index') }}" aria-expanded="{{ ($category_name === 'university') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                <span>University</span>
                            </div>
                        </a>
                    </li>
                    {{-- Gallery --}}

                    <li class="menu {{ ($category_name === 'HomePage') ? 'active' : '' }}">
                        <a href="{{ route('HomePage.index') }}" aria-expanded="{{ ($category_name === 'HomePage') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Home Setting</span>
                            </div>
                        </a>
                    </li>
                    {{-- Home setting --}}
                    <li class="menu {{ ($category_name === 'testimonial') ? 'active' : '' }}">
                        <a href="{{ route('Testimonial.index') }}" aria-expanded="{{ ($category_name === 'testimonial') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                <span>Testimonial</span>
                            </div>
                        </a>
                    </li>
                    {{-- Home setting --}}

            </ul>

        </nav>

    </div>
    <!--  END SIDEBAR  -->

@endif
