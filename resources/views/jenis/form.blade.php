<div class="modal fade" id="formJenisModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Jenis</h4>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <form id="formModalJenis" method="post" action="jenis">
                        @csrf
                        <div id="method"></div>
                        <div class="card-body">
                            <div class="input-group input-group-outline my-3">
                                <label for="nama_jenis" class="form-label">Nama Jenis</label>
                                <input type="text" class="form-control" id="nama_jenis" value="" name="nama_jenis">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>