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
            $data = Product::with('category');
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
            'price' => $request->price,

        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;

            $product->update(['image' => $imagePath]);
            
        }

        return redirect()->route('products.list');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
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

    public function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['success' => 'Product deleted successfully.']);
    }

}
