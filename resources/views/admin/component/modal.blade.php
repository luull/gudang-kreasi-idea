<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <img src="{{ asset('admin/assets/img/question.svg') }}" class="img-fluid" alt="">
                    <hr>
                    <div class="text-center">
                        <h6 class="modal-text">Apakah Anda yakin ingin menghapus Data ini?
                        </h6>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @yield('modal_delete')
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i data-feather="close"></i>
                </button>
            </div>
            @yield('modal_add')
        </div>
    </div>
</div>



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i data-feather="close"></i>
                </button>
            </div>
            @yield('modal_edit')
        </div>
    </div>
</div>
