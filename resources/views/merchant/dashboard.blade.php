@extends('layouts.index')

@section('content')
    <style>
        .img-account-profile {
            height: 3rem;
            width: 3rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .rounded-circle-v {
            border-radius: 50% !important;
        }

        .fotocenter {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            font-size: 12px;
        }
    </style>
    <div class="container-fluid">

        <div class="content mt-2">
            <div class="col-12">
                <a id="tambah_menu" href="/menu/create" class="btn btn-primary my-2"><i class="fa-regular fa-square-plus"></i>
                    Tambah
                    Data</a>
            </div>
            <table class="table table-striped mt-2">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Menu</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($daftarMenu as $item)
                    @php
                        $path = Storage::url('menu/' . $item->foto);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if (empty($item->foto))
                                <img class="img-account-profile rounded-circle" src="{{ asset('assets/img/food.png') }}"
                                    alt="avatar">
                            @else
                                <img class="img-account-profile rounded-circle" src="{{ url($path) }}" alt="avatar">
                            @endif
                        </td>
                        <td>{{ $item->menu }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success btn-sm edit mx-1" href="menu/{{ $item->id }}/edit"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <form action="/menu/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm delete" data-name="{{ $item->menu }}"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="modal">

            {{-- modal tambah --}}
            <div class="modal fade" id="modal_tambah_menu" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Daftar Mnu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/menu" method="POST" id="addModalMenu" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-code-branch"></i></span>
                                        <input id="nik" name="nik" type="text" class="form-control"
                                            placeholder="NIK" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-regular fa-face-smile"></i></span>
                                        <input id="nama" name="nama" type="text" class="form-control"
                                            placeholder="Nama Lengkap" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                                        <input id="email" name="email" type="text" class="form-control"
                                            placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-square-phone"></i></span>
                                        <input id="no_telp" name="no_telp" type="text" class="form-control"
                                            placeholder="Nomor Telepon" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                                        <input id="divisi_input" name="divisi" type="text" class="form-control"
                                            placeholder="Divisi" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                                        <input id="foto" name="foto" class="form-control" type="file"
                                            id="formFile">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>
                                    Tambah Data</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('myscript')
    <script>
        $(function() {
            $('.edit').click(function() {
                var nik = $(this).attr('nik');
                $.ajax({
                    type: "POST",
                    url: '/panel/update-karyawan',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        nik: nik
                    },
                    success: function(respond) {
                        $('#updateForm').html(respond);
                    }
                });
                $('#modal-edit').modal("show");
            });

            $('.view').click(function() {
                var nik = $(this).attr('nik');
                $.ajax({
                    type: "POST",
                    url: '/panel/view-karyawan',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        nik: nik
                    },
                    success: function(respond) {
                        $('#viewForm').html(respond);
                    }
                });
                $('#modal-view').modal("show");
            });

            $('.delete').click(function(e) {
                var form = $(this).closest("form");
                var menu = $(this).data('name');
                e.preventDefault();
                Swal.fire({
                    title: "Apa Anda Yakin Akan Menghapus " + "'" + menu + "'" + "?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire("Terhapus", "", "success");
                    }
                });
            });


        });
    </script>
@endpush
