<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function list(Request $request)
{
    $products = Product::pluck('name', 'id');

    if ($request->ajax()) {
        $data = Order::groupBy('order_id', 'customer_name', 'phone', 'created_at')
            ->select('order_id', 'customer_name', 'phone', DB::raw('SUM(price) as price'), 'created_at')
            ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                // Your action column code here
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('order-list')->with('products', $products);
}


    public function store(Request $request)
    {

        $orderId = '#ODR' . Str::random(5);
        for ($i = 0; $i < count($request->product); $i++) {
            $product = Product::where('id', $request->product[$i])->first();
            $price = $product->price;
            $netAmount = $request->quantity[$i] * $price;
            $order = Order::create([
                'order_id' => $orderId,
                'product_id' => $request->product[$i],
                'customer_name' => $request->customer_name,
                'phone' => $request->phone,
                'quantity' => $request->quantity[$i],
                'price' => $netAmount,
            ]);
        }

        return redirect()->route('orders.list');
    }

    public function update(Request $request, $id)
    {
        $product = Order::findOrFail($id);
        $product->update([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('edit-name'),
            'price' => $request->input('edit-price'),
        ]);

        if ($request->hasFile('edit-image') && $request->file('edit-image')->isValid()) {
            $image = $request->file('edit-image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;

            $product->update(['image' => $imagePath]);
        }

        return response()->json(['success' => 'Product updated successfully.']);
    }

    public function invoice(Order $order)
{
    $products = $order->products()->get(['name', 'price']);
    $total = 0;

    foreach ($products as $product) {
        $quantity = $order->products()->where('product_id', $product->id)->first()->pivot->quantity;
        $product->quantity = $quantity;
        $total += $product->price * $quantity;
    }

    $data = [
        'order_id' => $order->order_id,
        'products' => $products,
        'total' => $total,
    ];

    return response()->json($data);
}



    public function delete(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['success' => 'Order deleted successfully.']);
    }
}
