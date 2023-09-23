@extends('webfront.templates.master')
@section('url-title')
    Naskah
@endsection
@section('custom-css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-carousel.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('webfront/img/perpus.jpg');">
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
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">
  <h3 class="text-center">Silahkan Download</h3>
  <hr>
          <div class="row gy-4 mt-4 justify-content-center">
  @foreach($data as $d)
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
              <div class="icon flex-shrink-0"><i class="fa-solid fa-download"></i></div>
              <div>
                <h4 class="title">{{$d->title}}</h4>
                <p class="description">{{$d->subtitle}}</p>
                <a href="{{$d->link}}" target="_blank" class="readmore stretched-link"><span>Download</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
        
            @endforeach
          </div>
        </div>
      </section><!-- End Featured Services Section -->
    @endsection
