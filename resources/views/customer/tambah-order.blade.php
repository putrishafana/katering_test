@extends('customer.layouts.index')

@section('content')
    <div class="container-fluid mt-5">
        <h5>Tambah Order</h5>
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url('menu/' . $menu->foto) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->menu }}</h5>
                        <p class="card-text">{{ $menu->deskripsi }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <form action="/order" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input id="user_id" name="user_id" type="hidden" class="form-control" value={{ Auth::user()->id }}
                        required>
                    <div class="mb-3">
                        <div class="input-group">
                            <select name="menuId" id="menuId" class="form-select" readonly>
                                <option value="{{ $menu->id }}">{{ $menu->menu }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input id="tanggal_pengiriman" name="tanggal_pengiriman" type="date" class="form-control"
                                placeholder="" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input id="harga" name="harga" type="number" class="form-control"
                                value={{ $menu->harga }} placeholder="Deskripsi" required readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input id="jumlah" name="jumlah" type="number" class="form-control"
                                placeholder="Jumlah Pesanan" oninput="calculateTotal()" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input id="total_harga" name="total_harga" type="number" class="form-control"
                                placeholder="Total Harga" required></input>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Tambah
                        Data</button>

                </form>
            </div>
        </div>

    </div>
@endsection
@push('myscript')
    <script>
        function calculateTotal() {
            const jumlah = parseInt(document.getElementById('jumlah').value) || 0;
            const harga = parseFloat(document.getElementById('harga').value) || 0;
            document.getElementById('total_harga').value = jumlah * harga;
        }
    </script>
@endpush
