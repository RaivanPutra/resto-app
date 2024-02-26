<div class="col-12">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Table {{ $title }}</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">image
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Menu
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Jenis
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $m)
                        <tr class="text-center">
                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-bold">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</span>
                            </td>
                            <!-- <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $m->image }}</span>
                            </td> -->
                            <td class="align-middle align-center">
                                <div class="d-flex px-2 py-1 ">
                                    <div class="align-middle align-center">
                                        <img src="{{ asset('storage/menu-image/' . $m ->image) }}"
                                            class="avatar avatar-sm ms-5 border-radius-lg" alt="user1">
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $m->nama_menu }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $m->jenis->nama_jenis }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $m->harga }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $m->stok }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $m->deskripsi }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <button class="btn" data-bs-toggle="modal" data-bs-target="#formMenuModal"
                                    data-mode="edit" data-id="{{ $m->id }}" data-nama_menu="{{ $m->nama_menu }}"
                                    data-jenis-id="{{ $m->jenis->id_jenis }}" data-harga="harga" data-image="image"
                                    data-deskipsi="deskripsi">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form method="post" action="{{ route('menu.destroy', $m->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete-data" data-nama_menu="{{ $m->nama_menu }}">
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