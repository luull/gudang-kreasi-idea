@if (session('message'))
    <div class="alert {{ session('color') }} mb-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ...
            </svg></button>
        <i class="far fa-bell mr-2" style="font-size:20px"></i>
        <strong>{{ session('message') }}</strong></button>
    </div>
@endif
