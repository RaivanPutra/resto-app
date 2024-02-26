@extends('templates.main')

@push('style')
@endpush

@section('content')
Pelanggan
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
            <button type="button" class="btn bg-danger ms-4 text-white" data-bs-toggle="modal"
                data-bs-target="#formPelangganModal">
                <i class="fas fa-plus"></i> Add Pelanggan
            </button>
            <!--Modal -->
            @include('pelanggan.form')
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        @include('pelanggan.data')
    </div>
</div>
@endsection

@push('script')
<script>
$(document).ready(function() {
    $('#data-pelanggan').DataTable();
})

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

$('#formPelangganModal').on('show.bs.modal', function(e) {
    const btn = $(e.relatedTarget)
    console.log(btn.data('mode'))
    const mode = btn.data('mode')
    const nama = btn.data('nama')
    const email = btn.data('email')
    const no_tlp = btn.data('no_tlp')
    const alamat = btn.data('alamat')
    const id = btn.data('id')
    const modal = $(this)
    if (mode == 'edit') {
        modal.find('.modal-title').text('Edit Data Pelanggan')
        modal.find('#nama').val(nama)
        modal.find('#email').val(email)
        modal.find('#no_tlp').val(no_tlp)
        modal.find('#alamat').val(alamat)
        modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}/' + id)
        modal.find('#method').html('@method("PATCH")')
    } else {
        modal.find('.modal-title').text('Input Data Pelanggan')
        modal.find('#nama').val('')
        modal.find('#email').val('')
        modal.find('#no_tlp').val('')
        modal.find('#alamat').val('')
        modal.find('#method').html('')
        modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}')
    }
})
</script>
@endpush