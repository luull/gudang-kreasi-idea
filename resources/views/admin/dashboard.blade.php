@extends('admin.templates.master')
@section('custom-css')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
@endsection
@section('subheader')
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">
                                    @section('url-title')
                                        Dashboard
                                    @endsection
                                    @yield('url-title')
                                </a></li>
                            {{-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> --}}
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>
    </header>
</div>
@endsection
@section('content')
<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="alert alert-light-primary mb-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg data-dismiss="alert"> ...
            </svg></button>

        <strong>Selamat Datang {{ session('admin_data')->username }}!</strong>.
    </div>
</div>
@endsection
