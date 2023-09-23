@extends('webfront.templates.master')
@section('custom-css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('url-title')
    Detail {{$blog->title}}
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url({{ asset($blog->image) }});">
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
                    <li><a href="/blog/all">Artikel</a></li>
                    <li>@yield('url-title')</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <section id="detail" class="detail pt-0 mt-5">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12 mb-3">
           
                    <p class="mb-5 mx-3" style="float: left"><i class="far fa-user mx-3"></i>{{$blog->publisher}}</p>
                    <p class="mb-5"><i class="far fa-calendar mx-2"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</p>
                    <div class="text-center">
                        <img src="{{ asset($blog->image) }}" class="img-fluid" style="width:100%;" alt="">
                    </div>
                </div>
                <div class="col-md-12 mb-3">
           
                    <h3 class="nunito bolder mb-2">{{$blog->title }} </h3>
                    <p class="nunito mb-2">{!! $blog->content !!} </p>
                    </div>
                   
                </div>
       
            </div>
        </div>
    </section>
@endsection
