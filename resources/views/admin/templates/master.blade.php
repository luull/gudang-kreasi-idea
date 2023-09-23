<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ session('config')->name }} | @yield('url-title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset(session('config')->logo) }}" />
    <link href="{{ asset('admin/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin/assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/structure.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    @yield('custom-css')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('admin/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/elements/alert.css') }}">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <!-- choose one -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <script src="{{ asset('webfront/font-icons/feather/feather.min.js') }}"></script>
    <script type="text/javascript">
        feather.replace();
    </script>
    <script>
        $(document).ready(function() {
            var MediaSize = {
                xl: 1200,
                lg: 99,
                md: 991,
                sm: 576
            };
            var ToggleClasses = {
                headerhamburger: '.toggle-sidebar',
                inputFocused: 'input-focused',
            };
            var Selector = {
                mainHeader: '.header.navbar',
                headerhamburger: '.toggle-sidebar',
                fixed: '.fixed-top',
                mainContainer: '.main-container',
                sidebar: '#sidebar',
                sidebarContent: '#sidebar-content',
                sidebarStickyContent: '.sticky-sidebar-content',
                ariaExpandedTrue: '#sidebar [aria-expanded="true"]',
                ariaExpandedFalse: '#sidebar [aria-expanded="false"]',
                contentWrapper: '#content',
                contentWrapperContent: '.container',
                mainContentArea: '.main-content',
                searchFull: '.toggle-search',
                overlay: {
                    sidebar: '.overlay',
                    cs: '.cs-overlay',
                    search: '.search-overlay'
                }
            };
            $('.sidebarCollapse').on('click', function(sidebar) {
                sidebar.preventDefault();
                $(Selector.mainContainer).toggleClass("sidebar-closed");
                $(Selector.mainHeader).toggleClass('expand-header');
                $(Selector.mainContainer).toggleClass("sbar-open");
                $('.overlay').toggleClass('show');
                $('html,body').toggleClass('sidebar-noneoverflow');
            });
            $('#dismiss, .overlay, cs-overlay').on('click', function() {
                // hide sidebar
                $(Selector.mainContainer).addClass('sidebar-closed');
                $(Selector.mainContainer).removeClass('sbar-open');
                // hide overlay
                $('.overlay').removeClass('show');
                $('html,body').removeClass('sidebar-noneoverflow');
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/405cc35206.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    @include('admin.component.modal')
    @include('admin.templates.header')
    @yield('subheader')
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        @include('admin.templates.sidebar')
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">

                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    @yield('custom-js')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('admin/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard/dash_1.js') }}"></script>
</body>

</html>
