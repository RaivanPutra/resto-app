@extends('templates.main')

@push('style')
@endpush

@section('content')
Menu
@endsection

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible text-white fade show mx-3" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible text-white fade show ms-3" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                @foreach ($errors->all() as $error)
                <span class="alert-text"><strong>Error!</strong> {{ $error }}</span>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <button type="button" class="btn btn-danger ms-4" data-bs-toggle="modal" data-bs-target="#formMenuModal">
                <i class="fas fa-plus"></i> Add Menu
            </button>
            <!--Modal -->
            @include('menu.form')
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        @include('menu.data')
    </div>
</div>
@endsection

@push('script')
<script>
$('.alert-success').fadeTo(5000, 500).slideUp(500, function() {
    $('.alert-success').slideUp(500)
})

$('.alert-danger').fadeTo(10000, 500).slideUp(500, function() {
    $('.alert-danger').slideUp(500)
})

$('.delete-data').on('click', function(e) {
    e.preventDefault()
    const data = $(this).closest('tr').find('td:eq(1)').text()
    console.log(data);
    Swal.fire({
        title: `Apakah data <span style="color:red">${data}</span> akan dihapus?`,
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data ini!'
    }).then((result) => {
        if (result.isConfirmed)
            $(e.target).closest('form').submit()
        else swal.close()
    })
})

function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}

$('#formMenuModal').on('show.bs.modal', function(e) {
    const btn = $(e.relatedTarget)
    const mode = btn.data('mode')
    const id_jenis = btn.data('id_jenis')
    const nama_menu = btn.data('nama_menu')
    const harga = btn.data('harga')
    const stok = btn.data('stok')
    const image = btn.data('image')
    const deskripsi = btn.data('deskripsi')
    const id = btn.data('id')
    const modal = $(this)
    if (mode === 'edit') {
        modal.find('.modal-title').text('Edit Data Menu')
        modal.find('#id_jenis').val(id_jenis)
        modal.find('#nama_menu').val(nama_menu)
        modal.find('#harga').val(harga)
        modal.find('#stok').val(stok)
        modal.find('#old_image').val(image)
        modal.find('#deskripsi').val(deskripsi)
        // modal.find('.img-preview') attr('src', '{{ asset("storage/menu-image/") }}' + image)
        modal.find('.modal-body form').attr('action', '{{ url("menu") }}/' + id)
        modal.find('#method').html('@method("PATCH")')
    } else {
        modal.find('.modal-title').text('Input Data menu')
        modal.find('#id_jenis').val('')
        modal.find('#nama_menu').val('')
        modal.find('#harga').val('')
        modal.find('#stok').val('')
        modal.find('#old_image').val('')
        modal.find('#deskripsi').val('')
        modal.find('#.img-preview').attr('src', '')
        modal.find('#method').html('')
        modal.find('.modal-body form').attr('action', '{{ url("menu") }}')
    }
})
</script>
@endpush