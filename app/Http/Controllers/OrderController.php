<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Yajra\DataTables\Facades\Datatables;

class OrderController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('order-list');
    }
}
