<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\Posts;

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
        $request->validate([
            'title'=> 'required',
            'content' => 'required',
            'category' =>  'required'
        ]);

        Posts::create([
            'id' => Str::random(24),
            'title'=> $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'image_url' => ''
        ]);

        return redirect()->route('dashboard')
        ->withSuccess("You have successfully Adding Postingan {$request->title}!");

    }
}
