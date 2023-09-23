@extends('webfront.templates.master')
@section('url-title')
    Home
@endsection
@section('custom-meta')
    <meta property="og:title" content="{{ $company->name }} - {{ $company->title }}" />
    <meta property="og:image"
        content="{{ @file_exists(public_path($company->logo)) ? asset($company->logo) : asset('image/404.jpg') }}" />
    <meta property="og:description" content="{{ $company->subtitle }}" />
    <meta property="og:type" content="website" />
@endsection
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row gy-4 d-flex justify-content-between">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2 data-aos="fade-up">{{ session('config')->title_header }}</h2>
                    <p data-aos="fade-up" data-aos-delay="100">{{ session('config')->subtitle_header }}</p>
                    <div class="row">
                        <div class="col-md-6">

                            <a class="btn btn-primary px-5 py-3" target="_blank"
                                href="https://wa.me/{{ $company->phone }}?text=Saya%20ingin%20Bergabung%0a{{ env('APP_URL') }}">Daftar</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="{{ asset('webfront/img/header.svg') }}" class="img-fluid my-5" alt="">
                </div>

            </div>
        </div>
    </section><!-- End Hero Section -->
    <section id="about" class="about pt-0 my-5">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-12 content order-last order-lg-first">
                    <div class="section-header">
                        <span>Profil Penerbit</span>
                        <h2>Profil Penerbit</h2>

                    </div>
                    <p>
                        {!! session('config')->company_about !!}
                    </p>

                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->
    <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <span>Kerjasama</span>
                <h2>Kerjasama</h2>

            </div>

            <div class="row gy-4 justify-content-center">

                @foreach ($data as $k)
                    @if ($k->menu == 'kerjasama')
                        <div class="col-lg-4 col-md-6" datena-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset($k->image) }}" alt="" class="img-fluid"
                                        style="width: 100%;height:280px">
                                </div>
                                <h3 class="mb-0"><a href="/detail-blog/{{ $k->id }}">{{ $k->title }}</a></h3>
                                <div class="max-height mb-2" style="max-height: 150px;min-height:150px;overflow-y:scroll">
                                    <p>{!! Str::limit($k->content, 150, '...') !!}</p>
                                </div>
                                <p class="mb-5"><i class="far fa-user mx-3"></i>{{ $k->publisher }}</p>
                            </div>
                        </div><!-- End Card Item -->
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <span>Edukasi</span>
                <h2>Edukasi</h2>

            </div>

            <div class="row gy-4 justify-content-center">

                @foreach ($data as $k)
                    @if ($k->menu == 'edukasi')
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset($k->image) }}" alt="" class="img-fluid"
                                        style="width: 100%;height:280px">
                                </div>
                                <h3 class="mb-0"><a href="/detail-blog/{{ $k->id }}">{{ $k->title }}</a></h3>
                                <div class="max-height mb-2" style="max-height: 150px;min-height:150px;overflow-y:scroll">
                                    <p>{!! Str::limit($k->content, 150, '...') !!}</p>
                                </div>
                                <p class="mb-5"><i class="far fa-user mx-3"></i>{{ $k->publisher }}</p>
                            </div>
                        </div><!-- End Card Item -->
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
