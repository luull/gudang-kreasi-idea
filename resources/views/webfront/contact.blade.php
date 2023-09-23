@extends('webfront.templates.master')
@section('url-title')
    Kontak
@endsection
@section('custom-css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-carousel.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('/image/contact.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>@yield('url-title')</h2>
                        {{-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
                            consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione
                            sint. Sit quaerat ipsum dolorem.</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li>@yield('url-title')</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-12 ">
                    <iframe class="mb-4 mb-lg-0" src="{{ $configuration->link_address }}" frameborder="0"
                        style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>

            </div>
            <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bi bi-pin"></i>
                        <h3>Alamat</h3>
                        <small>{{ $configuration->address }}</small>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p>{{ $configuration->email }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <a target="_blank" href="https://wa.me/{{ $configuration->phone }}">
                        <div class="info-box mb-4">
                            <i class="bi bi-phone"></i>
                            <h3>No Telp</h3>
                            <p>{{ $configuration->phone }}</p>
                        </div>
                    </a>
                </div>

            </div>



        </div>
    </section>
@endsection
