@extends('admin.templates.master')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/dt-global_style.css') }}">
@endsection
@section('subheader')
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">
                                    @section('url-title')
                                        Layanan
                                    @endsection
                                    @yield('url-title')
                                </a></li>
                            @if (Request::is('admin/service/haki'))
                                <li class="breadcrumb-item active" aria-current="page"><span>Penguasa Haki</span></li>
                            @elseif(Request::is('admin/service/penelitian'))
                                <li class="breadcrumb-item active" aria-current="page"><span>Konversi Hasil
                                        Penelitian</span></li>
                            @elseif(Request::is('admin/service/kolaborasi'))
                                <li class="breadcrumb-item active" aria-current="page"><span>Menulis Kolaborasi</span>
                                </li>
                            @elseif(Request::is('admin/service/pelatihan'))
                                <li class="breadcrumb-item active" aria-current="page"><span>Pelatihan</span>
                                </li>
                            @elseif(Request::is('admin/service/konversi'))
                                <li class="breadcrumb-item active" aria-current="page"><span>Konversi KTI</span>
                                </li>
                            @elseif(Request::is('admin/service/editing'))
                                <li class="breadcrumb-item active" aria-current="page"><span>Editing Naskah</span>
                                </li>
                            @elseif(Request::is('admin/service/design'))
                                <li class="breadcrumb-item active" aria-current="page"><span>Design Cover</span>
                                </li>
                            @elseif(Request::is('admin/service/layout'))
                                <li class="breadcrumb-item active" aria-current="page"><span>Layout</span>
                                </li>
                            @endif
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>
    </header>
</div>
@endsection
@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    {{-- <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal">Tambah</button> --}}
    @include('admin.component.notif')
    <div class="widget-content widget-content-area br-6">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <form action="{{ route('upload-file-service') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Upload</label>
                                <span class="text-danger">* batas ukuran 2mb</span>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="image">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit"
                                            id="button-addon2">Upload</button>
                                    </div>
                                    @error('image')
                                        <br>
                                        <div class="text-danger mt-1">Gambar tidak sesuai dengan ketentuan</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <table id="dt" class="table dt-table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image Header</th>
                    <th>Title Header</th>
                    <th>Subtitle Header</th>
                    @if (Request::is('admin/service/pelatihan'))
                        <th>Training Date</th>
                    @endif
                    <th>Date created</th>
                    <th class="no-content">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><img src="{{ asset($d->image) }}" width="100px" class="img-thumbnail"></td>
                        <td>{{ $d->title }}</td>
                        <td>{{ $d->subtitle }}</td>
                        @if (Request::is('admin/service/pelatihan'))
                            <td>{{ $d->training_date }}</td>
                        @endif
                        <td>{{ $d->created_at }}</td>
                        <td>
                            <a href="#" class="edit btn btn-outline-primary mr-2 mb-2" id="e-{{ $d->id }}"
                                alt="Edit"><i class="fa fa-edit"></i></a>
                            {{-- <a data-toggle="modal" data-target="#deleteModal" alt="Delete" style="cursor: pointer"><i
                                        data-feather="trash" class="text-danger"></i></a> --}}
                            <a href="/admin/service/delete/{{ $d->id }}" class="btn btn-outline-danger mb-2"><i
                                    class="fa fa-trash"></i></a>


                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</div>
@section('modal_add')
    <form action="{{ route('proses-add-service') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                @if (Request::is('admin/service/haki'))
                    <input type="hidden" value="haki" class="form-control" name="menu">
                @elseif (Request::is('admin/service/penelitian'))
                    <input type="hidden" value="penelitian" class="form-control" name="menu">
                @elseif (Request::is('admin/service/kolaborasi'))
                    <input type="hidden" value="kolaborasi" class="form-control" name="menu">
                @elseif (Request::is('admin/service/pelatihan'))
                    <input type="hidden" value="pelatihan" class="form-control" name="menu">
                @elseif (Request::is('admin/service/konversi'))
                    <input type="hidden" value="konversi" class="form-control" name="menu">
                @elseif (Request::is('admin/service/editing'))
                    <input type="hidden" value="editing" class="form-control" name="menu">
                @elseif (Request::is('admin/service/design'))
                    <input type="hidden" value="design" class="form-control" name="menu">
                @elseif (Request::is('admin/service/layout'))
                    <input type="hidden" value="layout" class="form-control" name="menu">
                @endif
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger mt-1 mb-1">Title is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}">
                        @error('subtitle')
                            <div class="text-danger mt-1 mb-1">Subtitle is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="contentnya" class="form-control" name="content" rows="10" cols="50">
                         {{ old('content') }}
                        </textarea>
                        @error('content')
                            <div class="text-danger mt-1 mb-1">Content is required</div>
                        @enderror
                    </div>
                </div>
                @if (Request::is('admin/service/pelatihan'))
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Pelatihan</label>
                            <input type="date" name="training_date" class="form-control">
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <label>Image Header</label>
                    <span class="text-danger">* batas ukuran 2mb</span>
                    <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                    @error('image')
                        <br>
                        <div class="text-danger mt-1">Gambar tidak sesuai dengan ketentuan</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal"><i data-feather="cancel"></i> Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
@section('modal_edit')
    <form action="{{ route('proses-edit-service') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" id="edit_id" hidden>
        <div class="modal-body">
            <div class="row">
                @if (Request::is('admin/service/haki'))
                    <input type="hidden" value="haki" class="form-control" name="menu">
                @elseif (Request::is('admin/service/penelitian'))
                    <input type="hidden" value="penelitian" class="form-control" name="menu">
                @elseif (Request::is('admin/service/kolaborasi'))
                    <input type="hidden" value="kolaborasi" class="form-control" name="menu">
                @elseif (Request::is('admin/service/pelatihan'))
                    <input type="hidden" value="pelatihan" class="form-control" name="menu">
                @elseif (Request::is('admin/service/konversi'))
                    <input type="hidden" value="konversi" class="form-control" name="menu">
                @elseif (Request::is('admin/service/editing'))
                    <input type="hidden" value="editing" class="form-control" name="menu">
                @elseif (Request::is('admin/service/design'))
                    <input type="hidden" value="design" class="form-control" name="menu">
                @elseif (Request::is('admin/service/layout'))
                    <input type="hidden" value="layout" class="form-control" name="menu">
                @endif
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Title Header</label>
                        <input type="text" name="title" class="form-control" id="edit_title">
                        @error('title')
                            <div class="text-danger mt-1 mb-1">Title is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Subtitle Header</label>
                        <input type="text" name="subtitle" class="form-control" id="edit_subtitle">
                        @error('subtitle')
                            <div class="text-danger mt-1 mb-1">Subtitle is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="editcontentnya" class="form-control edit_content" id="edit_content" name="content" rows="10"
                            cols="50"></textarea>
                        @error('content')
                            <div class="text-danger mt-1 mb-1">Content is required</div>
                        @enderror
                    </div>
                </div>
                @if (Request::is('admin/service/pelatihan'))
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Pelatihan</label>
                            <input type="date" name="training_date" class="form-control" id="edit_training_date">
                            @error('training_date')
                                <div class="text-danger mt-1 mb-1">Tgl Pelatihan is required</div>
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Image header</label>
                        <span class="text-danger">* batas ukuran 2mb</span>
                        <br><img src="" class="img img-thumbnail" id="image_view" style="max-width:200px">
                        <br><input type="text" class="form-control input-default" id="image_edit" name="default"
                            hidden>
                        <input type="file" class="form-control input-default" name="image">
                        @error('image')
                            <br>
                            <div class="text-danger mt-1">Gambar tidak sesuai dengan ketentuan</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal"><i data-feather="cancel"></i> Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
@endsection
@section('custom-js')
<script src="{{ asset('admin/plugins/table/datatable/datatables.js') }}"></script>
<script>
    $('#dt').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
</script>
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
{{-- <script>
    var contentnya = document.getElementById("contentnya");
    CKEDITOR.replace(contentnya, {
        language: 'en-gb'
    });
</script> --}}
<script type="text/javascript">
    CKEDITOR.replace('contentnya', {
        filebrowserUploadUrl: "{{ route('ckeditor-upload', ['_token' => csrf_token()]) }}",
        filebrowserBrowseUrl: "{{ asset('/admin/file_browse_service?path=upload/service') }}",
        filebrowserUploadMethod: 'form'
    });
</script>
<script>
    $(document).ready(function() {
        $("#dt").on("click", ".edit", function() {
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];
            var url = "<?php echo env('APP_URL'); ?>/";

            $.ajax({
                type: 'get',
                method: 'get',
                url: '/admin/service/find/' + id,
                data: '_token = <?php echo csrf_token(); ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.message);
                    } else {
                        $("#image_view").show();
                        $("#image_view").attr('src', url + hsl.image);
                        $("#image_edit").val(hsl.image);
                        $("#edit_id").val(hsl.id);
                        $("#edit_title").val(hsl.title);
                        $("#edit_training_date").val(hsl.training_date);
                        $("#edit_subtitle").val(hsl.subtitle);
                        $("textarea.edit_content").val(hsl.content);
                        $("#editModal").modal();
                        var editbody = document.getElementById("editcontentnya");
                        CKEDITOR.replace(editbody, {
                            language: 'en-gb'
                        });
                        CKEDITOR.config.allowedContent = true;
                    }
                }
            });
        })
    })
</script>
@endsection
