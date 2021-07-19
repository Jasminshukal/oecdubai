@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">

                    <li class="menu {{ ($category_name === 'starter_kits') ? 'active' : '' }}">
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
                    </li>
                    <li class="menu {{ ($category_name === 'event') ? 'active' : '' }}">
                        {{-- <a href="{{ route('event.index') }}" aria-expanded="{{ ($category_name === 'events') ? 'true' : 'false' }}"> --}}
                        <a href="{{ url('event') }}" aria-expanded="{{ ($category_name === 'event') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Event</span>
                            </div>
                        </a>
                    </li>

            </ul>

        </nav>

    </div>
    <!--  END SIDEBAR  -->

@endif
