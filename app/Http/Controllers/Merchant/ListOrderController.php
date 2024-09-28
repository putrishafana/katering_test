<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class ListOrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $dataOrder = Order::whereHas('menu', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })
                    ->with('menu')
                    ->get();
            return view('merchant.list-order', compact('dataOrder'));
    }
}