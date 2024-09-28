<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $order = Order::with('menu')->findOrFail($id);
        return view('invoice.invoice', compact('order'));
    }

}