<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="/admin/dashboard" data-active="{{ Request::is('admin/dashboard') ? 'true' : 'false' }}"
                    aria-expanded="{{ Request::is('admin/dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="/admin/blog" data-active="{{ Request::is('admin/blog') ? 'true' : 'false' }}"
                    aria-expanded="{{ Request::is('admin/blog') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="flex flex-row align-item-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-layout">
                            <rect x="3" y="3" width="18" height="18" rx="2"
                                ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                        <span>Artikel</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="#service"
                    data-active="{{ Request::is('admin/service/haki', 'admin/service/penelitian', 'admin/service/kolaborasi') ? 'true' : 'false' }}"
                    data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle {{ Request::is('admin/service/haki', 'admin/service/penelitian', 'admin/service/kolaborasi') ? '' : 'collapsed' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-clipboard">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1"
                                ry="1"></rect>
                        </svg>
                        <span>Layanan</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('admin/service/haki', 'admin/service/penelitian', 'admin/service/kolaborasi', 'admin/service/pelatihan', 'admin/service/konversi', 'admin/service/editing', 'admin/service/design', 'admin/service/layout') ? 'show' : '' }}"
                    id="service" data-parent="#accordionExample">
                    <li class="{{ Request::is('admin/service/haki') ? 'active' : '' }}">
                        <a href="/admin/service/haki">Penguasa Haki</a>
                    </li>
                    <li class="{{ Request::is('admin/service/penelitian') ? 'active' : '' }}">
                        <a href="/admin/service/penelitian">Konversi Hasil Penelitian </a>
                    </li>
                    <li class="{{ Request::is('admin/service/kolaborasi') ? 'active' : '' }}">
                        <a href="/admin/service/kolaborasi">Menulis Kolaborasi </a>
                    </li>
                    <li class="{{ Request::is('admin/service/pelatihan') ? 'active' : '' }}">
                        <a href="/admin/service/pelatihan">Pelatihan </a>
                    </li>
                    <li class="{{ Request::is('admin/service/konversi') ? 'active' : '' }}">
                        <a href="/admin/service/konversi">konversi KTI </a>
                    </li>
                    <li class="{{ Request::is('admin/service/editing') ? 'active' : '' }}">
                        <a href="/admin/service/editing">Editing Naskah </a>
                    </li>
                    <li class="{{ Request::is('admin/service/design') ? 'active' : '' }}">
                        <a href="/admin/service/design"> Design Cover </a>
                    </li>
                    <li class="{{ Request::is('admin/service/layout') ? 'active' : '' }}">
                        <a href="/admin/service/layout">Layout </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="#product"
                    data-active="{{ Request::is('admin/banner', 'admin/product') ? 'true' : 'false' }}"
                    data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle {{ Request::is('admin/banner', 'admin/product') ? '' : 'collapsed' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Product</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ Request::is('admin/banner', 'admin/product') ? 'show' : '' }}"
                    id="product" data-parent="#accordionExample">
                    <li class="{{ Request::is('admin/banner') ? 'active' : '' }}">
                        <a href="/admin/banner">Banner </a>
                    </li>
                    <li class="{{ Request::is('admin/product') ? 'active' : '' }}">
                        <a href="/admin/product"> Product </a>
                    </li>
                    <li class="{{ Request::is('admin/category') ? 'active' : '' }}">
                        <a href="/admin/category"> Category </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="/admin/naskah" data-active="{{ Request::is('admin/naskah') ? 'true' : 'false' }}"
                    aria-expanded="{{ Request::is('admin/naskah') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-layers">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span>Naskah Download</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="/admin/link" data-active="{{ Request::is('admin/link') ? 'true' : 'false' }}"
                    aria-expanded="{{ Request::is('admin/link') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-cpu">
                            <rect x="4" y="4" width="16" height="16" rx="2"
                                ry="2"></rect>
                            <rect x="9" y="9" width="6" height="6"></rect>
                            <line x1="9" y1="1" x2="9" y2="4"></line>
                            <line x1="15" y1="1" x2="15" y2="4"></line>
                            <line x1="9" y1="20" x2="9" y2="23"></line>
                            <line x1="15" y1="20" x2="15" y2="23"></line>
                            <line x1="20" y1="9" x2="23" y2="9"></line>
                            <line x1="20" y1="14" x2="23" y2="14"></line>
                            <line x1="1" y1="9" x2="4" y2="9"></line>
                            <line x1="1" y1="14" x2="4" y2="14"></line>
                        </svg>
                        <span>Link</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="/admin/team" data-active="{{ Request::is('admin/team') ? 'true' : 'false' }}"
                    aria-expanded="{{ Request::is('admin/team') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Team</span>
                    </div>
                </a>
            </li>

            @if (session('admin_data')->level == 1)
                <li class="menu">
                    <a href="/admin/admin" data-active="{{ Request::is('admin/admin') ? 'true' : 'false' }}"
                        aria-expanded="{{ Request::is('admin/admin') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                <rect x="3" y="11" width="18" height="11" rx="2"
                                    ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <span>Admin</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="/admin/configuration"
                        data-active="{{ Request::is('admin/configuration') ? 'true' : 'false' }}"
                        aria-expanded="{{ Request::is('admin/configuration') ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Configuration</span>
                        </div>
                    </a>
                </li>
            @endif

        </ul>

    </nav>

</div>
