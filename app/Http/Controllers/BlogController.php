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
    

    public function showFormBlog() {
        $categories = Categories::all();
        return view('blog.formBlog', ['categories'=> $categories]);
    }

    public function store(Request $request) {
        $request->validate([
            'title'=> 'required',
            'content' => 'required',
            'category' =>  'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('gambar')) {
            $gambarPath = Str::random(20) . '.' . $request->file('gambar')->getClientOriginalExtension(); 
            $request->file('gambar')->storeAs('public/gambar', $gambarPath);
        } else {
            $gambarPath = null;
        }

        Posts::create([
            'id' => Str::random(24),
            'title'=> $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'image_url' => $gambarPath
        ]);

        return redirect()->route('dashboard')
        ->withSuccess("You have successfully Adding Postingan {$request->title}!");

    }

    public function delete(Request $req) {
        $req->validate([
            'blog_id' => 'required'
        ]);

        $postingan = Posts::find($req->blog_id);
        $postingan->delete();

        return redirect()->route('dashboard')->withSuccess("Postingan {$postingan->title} Telah di Hapus!");
    }
}
