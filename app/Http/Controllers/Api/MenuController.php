<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\User;


class MenuController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $daftarMenu = Menu::where('user_id', $user->id)->with('userData')->get();
        return view('merchant.dashboard', compact('daftarMenu'));
    }

    public function create()
    {
        return view('merchant.tambah-menu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $daftarMenu = new Menu();
        $daftarMenu->menu = $request->menu;
        $daftarMenu->user_id = $request->user_id;
        $daftarMenu->jenis = $request->jenis;
        $daftarMenu->deskripsi = $request->deskripsi;
        $daftarMenu->harga = $request->harga;
        if ($request->hasFile("foto")) {
            if ($daftarMenu->foto) {
                $existingImagePath = public_path('storage/menu/') . $daftarMenu->foto;
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            $file = $request->file("foto");
            $gambar = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/menu'), $gambar);
            $daftarMenu->foto = $gambar;
        }
        $daftarMenu->save();

        if ($daftarMenu) {
            return redirect('/menu');
        }
    }

    public function edit($id)
    {
        $daftarMenu = Menu::find($id);
        return view('merchant.edit-menu', compact('daftarMenu'));
    }

    public function show($id)
    {
        $daftarMenu = Menu::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $daftarMenu = Menu::find($id);

        if (!$daftarMenu) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar Menu Tidak Ditemukan',
            ], 404);
        }

        $daftarMenu->menu = $request->menu;
        $daftarMenu->user_id = $request->user_id;
        $daftarMenu->jenis = $request->jenis;
        $daftarMenu->deskripsi = $request->deskripsi;
        $daftarMenu->harga = $request->harga;

        if ($request->hasFile("foto")) {
            if ($daftarMenu->foto) {
                $existingImagePath = public_path('storage/menu/') . $daftarMenu->foto;
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

            $file = $request->file("foto");
            $gambar = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/menu'), $gambar);
            $daftarMenu->foto = $gambar;
        }

        $daftarMenu->save();

        if ($daftarMenu) {
            return redirect('/menu');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $daftarMenu = Menu::find($id);

        if (!$daftarMenu) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar Menu Tidak Ditemukan',
            ], 404);
        }

        if ($daftarMenu->foto) {
            $existingImagePath = public_path('storage/menu/') . $daftarMenu->foto;
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }
        }

        $daftarMenu->delete();

    return redirect('/menu')->with('success', 'Menu berhasil dihapus');
    }
}