@extends('layouts.index')

@section('content')
    <div class="container-fluid">

        <form action="/menu" method="POST" enctype="multipart/form-data">
            @csrf
            <input id="user_id" name="user_id" type="hidden" class="form-control" value={{ Auth::user()->id }} required>
            <div class="mb-3">
                <div class="input-group">
                    <input id="menu" name="menu" type="text" class="form-control" placeholder="Nama Menu"
                        required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input id="jenis" name="jenis" type="text" class="form-control" placeholder="Jenis" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <textarea id="deskripsi" name="deskripsi" type="text" class="form-control" placeholder="Deskripsi" required></textarea>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input id="foto" name="foto" type="file" class="form-control" required></input>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <input id="harga" name="harga" type="number" class="form-control" placeholder="Harga"
                        required></input>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Tambah
                Data</button>

        </form>
    </div>
@endsection
