<div class="modal fade" id="formPelangganModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Pelanggan</h4>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <form id="formModalPelanggan" method="post" action="pelanggan">
                        @csrf
                        <div id="method"></div>
                        <div class="card-body">
                            <div class="input-group input-group-outline my-3">
                                <label for="nama" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nama" value="" name="nama">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="" name="email">
                            </div>
                            <div class=" input-group input-group-outline my-3">
                                <label class="form-label">Phone</label>
                                <input type="number" class="form-control" id="no_tlp" value="" name="no_tlp">
                            </div>
                            <div class=" input-group input-group-outline my-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" value="" name="alamat">
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