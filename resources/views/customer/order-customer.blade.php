@extends('customer.layouts.index')

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
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Menu Makanan</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Harga</th>
                    <th>Jumlah Pesanan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($dataOrder as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->menu->menu }}</td>
                        <td>{{ $item->tanggal_pengiriman }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->total_harga }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm edit mx-1" target="_blank"
                                    href="{{ route('order.invoice', $item->id) }}"><i class="fa-solid fa-print"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection

@push('myscript')
    <script></script>
@endpush
