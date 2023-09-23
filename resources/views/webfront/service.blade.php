@extends('webfront.templates.master')
@section('url-title')
    @if (!empty($data->menu))
        {{ $data->title }}
    @else
        No Data
    @endif
@endsection
@section('custom-css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-carousel.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url({{ asset($data->image ?? '') }});">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>@yield('url-title')</h2>
                        @if (!empty($data->subtitle))
                            <p>{{ $data->subtitle }}</p>
                            <a class="btn btn-primary px-5 py-2" target="_blank"
                                href="https://wa.me/{{ session('config')->phone }}?text=Saya%20ingin%20Bergabung%0a{{ env('APP_URL') }}">Daftar</a>
                        @endif
                        @if (!empty($data->training_date))
                            @if ($data->training_date !== '0000-00-00')
                                <p class="mt-5 mb-0"> <i class="fa fa-calendar mx-2"
                                        style="font-size:25px"></i>{{ \Carbon\Carbon::parse($data->training_date)->diffForHumans() }}
                                </p>
                            @endif
                        @endif
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
    <section id="service" class="service pt-0">
        <div class="container">
            <div class="col-md-12 my-5">
                @if (!empty($data->training_date))
                    @if ($data->training_date !== '0000-00-00')
                        <h4 style="font-weight: 700" class="mb-5"> <i class="far fa-calendar mx-2"
                                style="font-size:25px"></i>{{ \Carbon\Carbon::parse($data->training_date)->format('d, M Y') }}
                        </h4>
                    @endif
                @endif
                @if (!empty($data->content))
                    {!! $data->content !!}
                @endif
            </div>
        </div>
    </section>
@endsection
