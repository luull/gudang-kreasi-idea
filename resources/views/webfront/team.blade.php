@extends('webfront.templates.master')
@section('url-title')
    Team
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('webfront/img/perpus.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>@yield('url-title')</h2>
                        <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
                            consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione
                            sint. Sit quaerat ipsum dolorem.</p>
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
    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team pt-0 mt-5">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                @foreach ($data as $d)
                    <div class="col-lg-12 col-md-12 d-flex flex-row">
                        <div class="member">
                            <div class="row">
                                <div class="col-md-4 "
                                    style="display: flex;
                                justify-content: center;
                                align-items: center;
                         ">

                                    <img src="{{ asset($d->image) }}" class="img-fluid"
                                        style="margin: auto;
                                    display: block;"
                                        alt="">

                                </div>
                                <div class="col-md-8">

                                    <div class="member-content mt-4">
                                        <h4 class="text-start">{{ $d->name }}</h4>
                                        <span class="text-start">{{ $d->job }}</span>
                                        <p class="text-start">
                                            {{ $d->description }}
                                        </p>
                                        <p class="text-start">
                                            <b style="font-style: normal"> Education :</b> <br>
                                            {{ $d->education }}
                                        </p>
                                        <p class="text-start">
                                            <b style="font-style: normal"> Experience :</b> <br>
                                            {{ $d->experience }}
                                        </p>
                                        {{-- <div class="social">
                                            <a href=""><i class="bi bi-twitter"></i></a>
                                            <a href=""><i class="bi bi-facebook"></i></a>
                                            <a href=""><i class="bi bi-instagram"></i></a>
                                            <a href=""><i class="bi bi-linkedin"></i></a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>

        </div>
    </section><!-- End Our Team Section -->
    {{-- <div class="col-md-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for ($x = 0; $x < count($banner); $x++)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $x }}"
                        class="{{ $x == 0 ? 'active m' : '' }}"></li>
                @endfor
            </ol>
            <div class="carousel-inner">
                <?php $x = 0; ?>
                @foreach ($banner as $b)
                    <div class="carousel-item {{ $x == 0 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset($b->image) }}">
                    </div>
                    <?php $x++; ?>
                @endforeach


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    </div> --}}
@endsection
