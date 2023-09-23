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
                                        Configuration
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
<div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    @include('admin.component.notif')
    <div class="widget-content widget-content-area br-6">
        <form action="{{ route('proses-edit-config') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Title Header</label>
                        <input type="text" class="form-control" name="title_header"
                            value="{{ $data->title_header }}">
                        @error('title_header')
                            <div class="text-danger mt-1 mb-1">Title Header is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Subtitle Header</label>
                        <textarea class="form-control" name="subtitle_header">{{ $data->subtitle_header }}</textarea>
                        @error('subtitle_header')
                            <div class="text-danger mt-1 mb-1">Title Header is required</div>
                        @enderror
                    </div>
                    <hr>
                    <h4 class="mb-0 text-center my-0"><b>BIODATA PENERBIT</b></h4>
                    <hr>
                </div>
                <input type="text" value="{{ $data->id }}" name="id" hidden>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                        @error('name')
                            <div class="text-danger mt-1 mb-1">Name is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="phone" class="form-control" name="phone" value="{{ $data->phone }}">
                        @error('phone')
                            <div class="text-danger mt-1 mb-1">Phone is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $data->email }}">
                        @error('email')
                            <div class="text-danger mt-1 mb-1">Email is required</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>About</label>
                        <textarea name="company_about" id="contentnya" cols="5" rows="5">{{ $data->company_about }}</textarea>
                        @error('company_about')
                            <div class="text-danger mt-1 mb-1">About is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <br><img src="{{ asset($data->logo) }}" class="img img-thumbnail"
                                        style="max-width:200px">
                                </div>
                                <br><input type="text" class="form-control input-default" value="{{ $data->logo }}"
                                    name="default" hidden>
                            </div>
                            <div class="col-md-8">
                                <label>Logo</label>
                                <span class="text-danger">* batas ukuran 2mb</span>
                                <input type="file" class="form-control input-default" name="logo">
                                @error('logo')
                                    <br>
                                    <div class="text-danger mt-1">Gambar tidak sesuai dengan ketentuan</div>
                                @enderror
                                <div class="form-group mt-3">
                                    <label>Alamat</label>
                                    <textarea name="address" id="" cols="5" rows="5" class="form-control">{{ $data->address }}</textarea>
                                    @error('address')
                                        <div class="text-danger mt-1 mb-1">Address is required</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Link Address</label>
                        <input type="text" class="form-control" name="link_address"
                            value="{{ $data->link_address }}">
                        @error('link_address')
                            <div class="text-danger mt-1 mb-1">Link Address is required</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <iframe src="{{ $data->link_address }}" width="100%" height="350" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="ig" value="{{ $data->ig }}">
                        @error('ig')
                            <div class="text-danger mt-1 mb-1">Instagram is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="fb" value="{{ $data->fb }}">
                        @error('fb')
                            <div class="text-danger mt-1 mb-1">Facebook is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>twitter</label>
                        <input type="text" class="form-control" name="twitter" value="{{ $data->twitter }}">
                        @error('twitter')
                            <div class="text-danger mt-1 mb-1">Twitter is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h4 class="mb-0 text-center my-0"><b>SHOP PENERBIT</b></h4>
                    <hr>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Shopee</label>
                        <input type="text" class="form-control" name="shopee" value="{{ $data->shopee }}">
                        @error('shopee')
                            <div class="text-danger mt-1 mb-1">Shopee is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tokopedia</label>
                        <input type="text" class="form-control" name="tokped" value="{{ $data->tokped }}">
                        @error('tokped')
                            <div class="text-danger mt-1 mb-1">Tokopedia is required</div>
                        @enderror
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-block mb-3">Simpan</button>
        </form>
    </div>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    var contentnya = document.getElementById("contentnya");
    CKEDITOR.replace(contentnya, {
        language: 'en-gb'
    });
</script>
@endsection
