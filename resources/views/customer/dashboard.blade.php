@extends('customer.layouts.index')

@section('content')
    <div class="container-fluid mt-5">
        <form class="d-flex mb-5" action="/dash-customer" method="GET" role="search">
            <input class="form-control me-2" type="search" id="menu" name="menu" placeholder="Cari Menu Makanan Yuk..."
                value="{{ request('menu') }}" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>

        <div class="row">
            @foreach ($users as $user)
                @if ($user->menus->isNotEmpty())
                    <div class="row mb-4">
                        <p><b>Merchant <i class="fa-solid fa-chevron-right"></i> </b>{{ $user->name }}</p>

                        @foreach ($user->menus->chunk(4) as $chunk)
                            <div class="row mb-4">
                                @foreach ($chunk as $menu)
                                    <div class="col-3">
                                        @php
                                            $path = Storage::url('menu/' . $menu->foto);
                                        @endphp
                                        <div class="card" style="width: 18rem;">
                                            <img src="{{ url($path) }}" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $menu->menu }}</h5>
                                                <p class="card-text">{{ $menu->deskripsi }}</p>
                                                <div class="d-grid gap-2">
                                                    <a href="{{ route('order.create', ['menu_id' => $menu->id]) }}"
                                                        class="btn btn-primary">Order</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
