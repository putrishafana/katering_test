@extends('layouts.index')

@section('content')
    <div class="container-fluid">

        <form action="/profil/{{ $dataProfil->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <div class="input-group">
                    <input id="name" name="name" type="text" class="form-control" placeholder="Nama"
                        value="{{ $dataProfil->name ?? '' }}" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input id="email" name="email" type="text" class="form-control" placeholder="Email"
                        value="{{ $dataProfil->email ?? '' }}" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input id="no_telp" name="no_telp" type="text" class="form-control" placeholder="No Telepon"
                        value="{{ $dataProfil->no_telp ?? '' }}" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <textarea id="alamat" name="alamat" type="text" class="form-control" value="" placeholder="Alamat"
                        required>{{ $dataProfil->alamat ?? '' }}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <textarea id="deskripsi" name="deskripsi" type="text" class="form-control" value="" placeholder="Deskripsi"
                        required>{{ $dataProfil->deskripsi ?? '' }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrows-rotate"></i> Edit
                Data</button>

        </form>
    </div>
@endsection
