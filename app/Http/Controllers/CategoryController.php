<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\Datatables;

class CategoryController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('category-list');
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.list')->with('message', 'created!');
    }

    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['success' => 'Category deleted successfully.']);
    }
}
