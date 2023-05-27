<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Yajra\DataTables\Facades\Datatables;

class ProductController extends Controller
{
    public function list(Request $request)
    {
        $categories = Category::pluck('name', 'id');
        if ($request->ajax()) {
            $data = Product::with('category')->get;
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('product-list')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->amount,

        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
    
        }

        return redirect()->route('products.list');
    }

}
