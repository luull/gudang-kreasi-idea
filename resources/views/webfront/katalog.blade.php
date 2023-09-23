@extends('webfront.templates.master')
@section('url-title')
    Katalog
@endsection
@section('custom-css')
    <link href="{{ asset('css/custom-carousel.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
    .categories {
    width: 100%;
    box-sizing: border-box;
    height: auto;
    position: sticky;
    top: 0px;
    background-color: white;
    z-index: 10;
    display: flex;
    overflow: hidden;
    list-style-type: none;
    cursor: pointer;
    padding: 10px;

    gap: 10px;
}

.categories li {
    list-style: none;
    list-style-type: none;
    padding: 5px 20px;
    font-family: Roboto;
    width: fit-content !important;
    cursor: pointer;
    user-select: none;
    border-radius: 20px;
    border: 2px solid #cecfd3;
    transition-duration: 0.25s;
}
.categories li a{
    text-decoration:none;
}
.categories li:hover {
    transition: 0.5s;
    border: 2px solid #223172;
    color: white;
    background-color: #223172;
}

.categories li a {
    color: black;
}
.categories li:hover a {
    color: white;
}

.MainSlider {
    width: calc(100% - 50px);
    margin: 0px 25px;
    border-radius: 5px;
    height: 50vh;
}

.swiper-container {
    overflow: hidden;
    position: relative;
}
#MainSlider li {
    list-style: none;
    list-style-type: none !important;
}
#MainSlider .swiper-slide {
    border-radius: 5px;
    overflow: hidden;

}

.swiper-slide img {
    height: 100% !important;
    width: 100%;
    object-fit: cover;
}

.swiper-pagination {
    position: absolute;
    bottom: 10px
}

.swiper-pagination-bullet {
    opacity: 1;
    border: 1px solid #4361ee;
    background-color: white;
}

.swiper-pagination-bullet-active {
    background-color: #4361ee;

}
@media (max-width:700px) {
    .MainSlider{
        width:100%;
        margin:0px;;
        border-radius: 0px;
    }
}
    </style>
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
    <br>
    <section id="featured-services" class="featured-services">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
                    <div>
                        <h4 class="title">Proses
                            Pengiriman Cepat</h4>
                        <p class="description">Kami telah bekerjasama dengan sejumlah kurir, baik reguler atapun
                            pengiriman khusus.</p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-book"></i></div>
                    <div>
                        <h4 class="title">Stok Buku
                            Tersedia Penuh</h4>
                        <p class="description">Kami memiliki workshop dan percetakan sendiri, sehingga
                            memungkinkan stok buku selalu tersedia.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-truck"></i></div>
                    <div>
                        <h4 class="title">Garansi terhadap
                            kerusakan buku</h4>
                        <p class="description">Kami pastikan kualitas buku yang terkirim merupakan buku
                            terbaik,sehingga kami memberikan garansi 100%.</p>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>
    </section>
    <section id="katalog" class="katalog pt-0">
        <div class="container">
 
            <div class="col-md-12 mb-0">
         
                    <div class="MainSlider swiper-container">
                        <div class="swiper-wrapper" id="slideHolder">
                            @foreach ($banner as $b)
                        <div class='swiper-slide'>
                            <img src="{{ asset($b->image) }}" class="d-block w-100">
                        </div>
                        @endforeach
                        </div>
                         <div class="swiper-pagination"></div>   
                     </div>
                     <div class="categories my-2">
                    <ul class="swiper-wrapper">
                        @foreach($category as $c)
                        <li class="swiper-slide"><a href="/detail-category/{{$c->slug}}">{{$c->name}}</a></li>  
                        @endforeach
                    </ul>
                    </div>
                    
                        <div class="row row-no-padding justify-content-start">
                    @foreach ($data as $item)
                        <?php
                        $firsturl = str_replace(' ', '%20', $item->name);
                        $resulturl = str_replace('&', 'n', $firsturl);
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 mb-3">
                            <a href="/detail-katalog/{{ $item->slug }}">
                                <div class="card card-product">
                                    <img src="{{ asset($item->image) }}" class="card-img-top" alt="widget-card-2">
                                    <div class="card-body product">
                                        <div class="height-title">
                                            @if (\Str::length($item->name) > 35)
                                                <h5 class="card-title-produk-resize mb-0">{{ $item->name }}</h5>
                                            @else
                                                <h5 class="card-title-produk mb-0">{{ $item->name }}</h5>
                                            @endif

                                        </div>
                                        <small class="text-muted">{{$item->category->name}}</small>
                                        <p class="mb-2">Rp.<?php echo number_format($item->price);
                                        ?></h5>
                                            {{-- <p class="card-text">{!! Str::limit($item->keterangan_singkat, 50, '...') !!}</p> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                 
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script>
    const swiper = new Swiper('.MainSlider', {
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 1,
        loop: true,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        autoplay: { delay: 5000 }
    });
    var Cateogryswiper = new Swiper(".categories", {
        slidesPerView:"auto",
        spaceBetween: 10,
        freeMode: true,
      });
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(function() {
            var carouselExample = $('#carouselExampleIndicators');
            var carousel = carouselExample.carousel();

            var thumbs = $('.carousel-indicators li');
            thumbs.on('click', function() {
                var index = $(this).data('slide-to');
                carousel.carousel(index);
            });
        });
    </script>
@endsection
