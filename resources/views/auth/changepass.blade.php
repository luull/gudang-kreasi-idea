@extends('admin.templates.master')
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
                                        Change Password
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
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    @include('admin.component.notif')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="widget-content widget-content-area py-4 px-4 br-6">
                <div class="container">
                    <div class="text-center">
                        <img src="{{ asset('admin/assets/img/security.svg') }}"class="img-fluid my-5"
                            style="width: 400px" alt="">
                    </div>
                    <form class="text-left" action="{{ route('change-password') }}" method="POST">
                        @csrf
                        <div class="form">

                            <div id="password-field" class="field-wrapper input mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="old_password">Kata sandi lama</label>
                                </div>
                                <input id="old_password" name="old_password" type="password" class="form-control"
                                    placeholder="Old Password">
                                @error('old-password')
                                    <div class="text-danger mt-1 mb-1">Old Password is required</div>
                                @enderror

                            </div>
                            <div id="password-field" class="field-wrapper input mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="password">Kata sandi baru</label>
                                </div>

                                <input id="password" name="password" type="password" class="form-control"
                                    placeholder="New Password">
                                @error('password')
                                    <div class="text-danger mt-1 mb-1">New Password is required</div>
                                @enderror

                            </div>
                            <div id="password-field" class="field-wrapper input mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="password">Konfirmasi Kata sandi baru</label>
                                </div>

                                <input id="password1" name="password1" type="password" class="form-control"
                                    placeholder="Confirm New Password">
                                @error('password1')
                                    <div class="text-danger mt-1 mb-1">Confirm New Password is required</div>
                                @enderror

                            </div>
                            <hr>
                            <div class="d-sm-flex justify-content-between mb-3">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Simpan</button>
                                </div>
                            </div>


                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
