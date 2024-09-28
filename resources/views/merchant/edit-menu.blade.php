@extends('layouts.index')

@section('content')
    <div class="container-fluid">

        <form action="/menu/{{ $daftarMenu->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input id="user_id" name="user_id" type="hidden" class="form-control" value={{ $daftarMenu->user_id }} required>

            <div class="mb-3">
                <div class="input-group">
                    <input id="menu" name="menu" type="text" class="form-control" placeholder="Nama Menu"
                        value="{{ $daftarMenu->menu }}" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input id="jenis" name="jenis" type="text" class="form-control" placeholder="Jenis"
                        value="{{ $daftarMenu->jenis }}" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <textarea id="deskripsi" name="deskripsi" type="text" class="form-control" value="" placeholder="Deskripsi"
                        required>{{ $daftarMenu->deskripsi }}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input id="foto" name="foto" type="file" class="form-control"></input>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input id="harga" name="harga" type="number" class="form-control"
                        value="{{ $daftarMenu->harga }}" placeholder="Harga" required></input>
                </div>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrows-rotate"></i> Edit
                Data</button>

        </form>
    </div>
@endsection
