<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Menu;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $dataOrder = Order::where('user_id', $user->id)->with('userData')->get();

        return view('customer.order-customer', compact('dataOrder'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $menuId = $request->input('menu_id');
        $menu = Menu::findOrFail($menuId);
        return view('customer.tambah-order', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $daftarOrder = new Order();
        $daftarOrder->menuId = $request->menuId;
        $daftarOrder->user_id = $request->user_id;
        $daftarOrder->jumlah = $request->jumlah;
        $daftarOrder->tanggal_pengiriman = $request->tanggal_pengiriman;
        $daftarOrder->harga = $request->harga;
        $daftarOrder->total_harga = $request->total_harga;
        $daftarOrder->save();

        if ($daftarOrder) {
            return redirect('/dash-customer');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}