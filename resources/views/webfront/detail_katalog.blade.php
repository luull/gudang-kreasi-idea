@extends('webfront.templates.master')
@section('custom-meta')
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:image"
        content="{{ @file_exists(public_path($product->image)) ? asset($product->image) : asset('image/404.jpg') }}" />
    <meta property="og:description" content="{!! $product->description !!}" />
    <meta property="og:type" content="website" />
@endsection
@section('custom-css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('url-title')
    Detail {{ $product->name }}
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url({{ asset($product->image) }});">
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
                    <li><a href="/katalog">Katalog</a></li>
                    <li>@yield('url-title')</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <section id="detail" class="detail pt-0 mt-5">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="text-center">
                        <img src="{{ asset($product->image) }}" class="img-fluid" style="width:300px;" alt="">
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <a target="_blank"
                        href="https://wa.me/{{ $company->phone }}?text=Saya%20ingin%20Membeli%20*{{ $product->name }}*%0a{{ env('APP_URL') }}/detail-katalog/{{ $product->slug }}"
                        class="btn btn-outline-success" style="float:right;"> <i class="fa fa-shopping-cart"></i> Beli
                        produk</a>
                    <h2 class="nunito bolder">{{ $product->name }} </h2>
                    <p class="text-muted">{{$product->category->name}}</p>
                    <h4 class="nunito mb-4">Rp.<?php echo number_format($product->price); ?></h3>
                        <ul class="nav nav-tabs  mb-3 mt-3 nav-fill" id="justifyTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link nunito bolder active" id="justify-home-tab" data-toggle="tab"
                                    href="#justify-home" role="tab" aria-controls="justify-home"
                                    aria-selected="true">Info
                                    Produk</a>
                            </li>

                        </ul>

                        <div class="tab-content" id="justifyTabContent">
                            <div class="tab-pane fade show active" id="justify-home" role="tabpanel"
                                aria-labelledby="justify-home-tab">
                                {{-- <p><strong>Berat : {{ $product->berat }} gram</strong></p> --}}
                                <p class="mb-4">
                                    {{ $product->description }}
                                </p>


                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
