<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;

class DashboarController_C extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('menu');
        $users = User::with(['menus' => function ($query) use ($search) {
            if ($search) {
                $query->where('menu', 'like', '%' . $search . '%');
            }
        }])->get();

        return view('customer.dashboard', compact('users', 'search'));
    }
}