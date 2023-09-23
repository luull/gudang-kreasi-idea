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
                                        Team
                                    @endsection
                                    @yield('url-title')
                                </a></li>
                            {{-- @if (Request::is('admin/blog/haki'))
                                    <li class="breadcrumb-item active" aria-current="page"><span>Haki</span></li>
                                @elseif(Request::is('admin/blog/penelitian'))
                                    <li class="breadcrumb-item active" aria-current="page"><span>Penelitian</span></li>
                                @elseif(Request::is('admin/blog/kolaborasi'))
                                    <li class="breadcrumb-item active" aria-current="page"><span>Kolaborasi</span></li>
                                @endif --}}
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
    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal">Tambah</button>
    @include('admin.component.notif')
    <div class="widget-content widget-content-area br-6">
        <table id="dt" class="table dt-table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Job</th>
                    {{-- <th>Desc</th>
                    <th>Education</th>
                    <th>Experience</th> --}}
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
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->job }}</td>
                        {{-- <td>{{ $d->description }}</td>
                        <td>{{ $d->education }}</td>
                        <td>{{ $d->experience }}</td> --}}
                        <td>{{ $d->created_at }}</td>
                        <td>
                            <a href="#" class="edit btn btn-outline-primary mr-2 mb-2" id="e-{{ $d->id }}"
                                alt="Edit"><i class="fa fa-edit"></i></a>
                            {{-- <a data-toggle="modal" data-target="#deleteModal" alt="Delete" style="cursor: pointer"><i
                                        data-feather="trash" class="text-danger"></i></a> --}}
                            <a href="/admin/team/delete/{{ $d->id }}" class="btn btn-outline-danger mb-2"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</div>
@section('modal_add')
    <form action="{{ route('proses-add-team') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                {{-- @if (Request::is('admin/blog/haki'))
                    <input type="hidden" value="haki" class="form-control" name="menu">
                @elseif (Request::is('admin/blog/penelitian'))
                    <input type="hidden" value="penelitian" class="form-control" name="menu">
                @elseif (Request::is('admin/blog/kolaborasi'))
                    <input type="hidden" value="kolaborasi" class="form-control" name="menu">
                @endif --}}
                <div class="col-md-12">
                    <label>Photo</label>
                    <span class="text-danger">* batas ukuran 2mb</span>
                    <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                    @error('image')
                        <br>
                        <div class="text-danger mt-1">Gambar tidak sesuai dengan ketentuan</div>
                    @enderror
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger mt-1 mb-1">name is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Job</label>
                        <input type="text" name="job" class="form-control" value="{{ old('job') }}">
                        @error('job')
                            <div class="text-danger mt-1 mb-1">Job is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger mt-1 mb-1">Description is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Education</label>
                        <textarea class="form-control" name="education">{{ old('education') }}</textarea>
                        @error('education')
                            <div class="text-danger mt-1 mb-1">Education is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Experience</label>
                        <textarea class="form-control" name="experience">{{ old('experience') }}</textarea>
                        @error('experience')
                            <div class="text-danger mt-1 mb-1">Experience is required</div>
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
@section('modal_edit')
    <form action="{{ route('proses-edit-team') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" id="edit_id" hidden>
        <div class="modal-body">
            <div class="row">
                {{-- @if (Request::is('admin/blog/haki'))
                    <input type="hidden" value="haki" class="form-control" name="menu">
                @elseif (Request::is('admin/blog/penelitian'))
                    <input type="hidden" value="penelitian" class="form-control" name="menu">
                @elseif (Request::is('admin/blog/kolaborasi'))
                    <input type="hidden" value="kolaborasi" class="form-control" name="menu">
                @endif  --}}

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Photo</label>
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
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            id="edit_name">
                        @error('name')
                            <div class="text-danger mt-1 mb-1">name is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Job</label>
                        <input type="text" name="job" class="form-control" value="{{ old('job') }}"
                            id="edit_job">
                        @error('job')
                            <div class="text-danger mt-1 mb-1">Job is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="edit_desc">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger mt-1 mb-1">Description is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Education</label>
                        <textarea class="form-control" name="education" id="edit_education">{{ old('education') }}</textarea>
                        @error('education')
                            <div class="text-danger mt-1 mb-1">Education is required</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Experience</label>
                        <textarea class="form-control" name="experience" id="edit_experience">{{ old('experience') }}</textarea>
                        @error('experience')
                            <div class="text-danger mt-1 mb-1">Experience is required</div>
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
<script>
    var contentnya = document.getElementById("contentnya");
    CKEDITOR.replace(contentnya, {
        language: 'en-gb'
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
                url: '/admin/team/find/' + id,
                data: '_token = <?php echo csrf_token(); ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.message);
                    } else {
                        $("#image_view").show();
                        $("#image_view").attr('src', url + hsl.image);
                        $("#image_edit").val(hsl.image);
                        $("#edit_id").val(hsl.id);
                        $("#edit_name").val(hsl.name);
                        $("#edit_job").val(hsl.job);
                        $("#edit_desc").val(hsl.description);
                        $("#edit_education").val(hsl.education);
                        $("#edit_experience").val(hsl.experience);
                        // $("textarea.edit_content").val(hsl.content);
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
