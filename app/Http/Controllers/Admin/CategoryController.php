<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }


    public function index()
    {
        $categories = Categories::all();

        return view("category.index", compact("categories"));
    }

    public function store(Request $request)
    {
        $request->validate(['category_name' => "required|max:50"]);

        Categories::create([
            "category_name" => $request->category_name
        ])->save();

        return redirect()->route('category')->with('success', "[{$request->category_name}] Berhasil di Tambahkan!");
    }

    public function destroy(Request $request)
    {
        $request->validate(['category_id' => "required|int"]);
        $category = Categories::find($request->category_id);
        $category->delete();
        return redirect()->route('category')->with('success', "Category {$category->category_name} deleted successfully");
    }
}
