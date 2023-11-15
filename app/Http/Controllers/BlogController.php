<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function showIndex() {
        return view('blog.index');
    }

    public function showFormBlog() {
        $categories = Categories::all();
        return view('blog.formBlog', ['categories'=> $categories]);
    }

    public function storeBlog(Request $request) {
        $request->validate($request, [
            'title'=> 'required|min:8|max:100',
            'content' => 'require|min:8|max:500'
        ]);

        
    }
}
