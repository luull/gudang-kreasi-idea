@extends('webfront.templates.master')
@section('url-title')
    Artikel
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
    <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4 justify-content-center mt-5">
                    @if (Request::is('blog/dosen'))
                    @foreach ($dosen as $k)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset($k->image) }}" alt="" class="img-fluid" style="width: 100%;height:280px">
                                </div>
                                <h3 class="mb-0"><a href="/detail-blog/{{$k->id}}">{{ $k->title }}</a></h3>
<div class="max-height mb-2" style="max-height: 150px;height:150px;overflow:scroll">
                                    <p>{!! Str::limit($k->content, 150, '...') !!}</p>
</div>
<p class="mb-5"><i class="far fa-user mx-3"></i>{{$k->publisher}}</p>
                            </div>
                        </div><!-- End Card Item -->
                    @endforeach
                    @endif
                    @if (Request::is('blog/all'))
                    @foreach ($data as $k)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset($k->image) }}" alt="" class="img-fluid" style="width: 100%;height:280px">
                                </div>
                                <h3 class="mb-0"><a href="/detail-blog/{{$k->id}}">{{ $k->title }}</a></h3>
                                <div class="max-height mb-2" style="max-height: 150px;height:150px;overflow:scroll">
                                    <p>{!! Str::limit($k->content, 150, '...') !!}</p>
</div>
<p class="mb-5"><i class="far fa-user mx-3"></i>{{$k->publisher}}</p>
                            </div>
                        </div><!-- End Card Item -->
                    @endforeach
                    @endif
            </div>
        </div>
    </section>
@endsection
