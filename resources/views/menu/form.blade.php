<div class="modal fade" id="formMenuModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Menu</h4>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <form id="formModalMenu" method="post" action="menu" enctype="multipart/form-data">
                        @csrf
                        <div id="method"></div>
                        <input type="hidden" name="old_image" id="old_image">
                        <div class="card-body">
                            <div class="input-group input-group-outline my-3">
                                <label for="nama_menu" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control" id="nama_menu" value="" name="nama_menu">
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Nama Jenis</label>
                                <select class="form-control" id="exampleFormControlSelect1" id="id_jenis"
                                    name="id_jenis">
                                    <option value="" selected disabled>Pilih Nama Jenis</option>
                                    @foreach ($jenis as $j)
                                    <option id="id_jenis" value="{{ $j->id }}" name="id_jenis" data-id="$j->id">
                                        {{ $j->nama_jenis }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="harga" value="" name="harga">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" class="form-control" id="stok" value="" name="stok">
                            </div>
                            <div class="mb-3">
                                <img class="img-preview img-fuild" style="max-height: 200px">
                                <label for="fileInput" class="form-label">Upload Image Menu</label>
                                <input class="form-control" type="file" id="image" value="" name="image"
                                    onchange="previewImage()">
                            </div>
                            <!-- <div class="input-group input-group-lg input-group-outline my-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control form-control-lg"" id=" deskripsi" value=""
                                    name="deskripsi">
                            </div> -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" value="" name="deskripsi"
                                    rows="3"></textarea>
                            </div>

                        </div>
                        <div class=" card-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>