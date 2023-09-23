@extends('webfront.templates.master')
@section('custom-meta')
    <meta property="og:title" content="{{ $category->name }}" />
    <meta property="og:image"
        content="{{ @file_exists(public_path($category->image)) ? asset($category->image) : asset('image/404.jpg') }}" />
    <meta property="og:description" content="{!! $category->description !!}" />
    <meta property="og:type" content="website" />
@endsection
@section('custom-css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('url-title')
    Kategori {{ $category->name }}
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url({{ asset($category->image) }});">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>@yield('url-title')</h2>
                        <p>{{$category->description}}</p> 
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
        <div class="row row-no-padding justify-content-start">
                    @if(count($product) > 0)
                    @foreach ($product as $item)
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
                    @else
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('image/no-data.svg')}}" class="img-fluid text-center" style="width:200px" alt="">

                                </div>
                                <div class="col-md-8">
                                    
                                    <h2 class="text-muted mt-5">Tidak ada data dikategori <b>"{{$category->name}}"</b></h2>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
        </div>
    </section>
@endsection
