<div class="col-12">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Table {{ $title }}</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="data-pelanggan">
                    <thead>
                        <tr class="text-center">
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telepom
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $p)
                        <tr class="text-center">
                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-bold">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $p->nama }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $p->email }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $p->no_tlp }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $p->alamat }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <button class="btn" data-bs-toggle="modal" data-bs-target="#formPelangganModal"
                                    data-mode="edit" data-id="{{ $p->id }}" data-nama="{{ $p->nama }}" data-email="{{ $p->email }}" data-no_tlp="{{ $p->no_tlp }}" data-alamat="{{ $p->alamat }}" data-no_tlp="{{ $p->no_tlp }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form method="post" action="{{ route('pelanggan.destroy', $p->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete-data" data-nama="{{ $p->nama }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>