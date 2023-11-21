<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categories;

class RootController extends Controller
{ 
    public static function pisahkanGanjilGenap($array) {
        $barisGanjil = [];
        $barisGenap = [];
    
        foreach ($array as $key => $baris) {
            if ($key % 2 == 0) {
                // Baris ganjil
                $barisGanjil[] = $baris;
            } else {
                // Baris genap
                $barisGenap[] = $baris;
            }
        }
    
        return [
            'ganjil' => $barisGanjil,
            'genap' => $barisGenap,
        ];
    }

    public function root (Request $req) {
        if($req->query('find') != null) {
            $posts = Posts::where('title', 'LIKE', "%" . $req->query('find') . "%")->get();
        } else {
            $posts = Posts::all();
        }
        
        $categories = self::pisahkanGanjilGenap(Categories::all());
        $blogs = self::pisahkanGanjilGenap($posts);
        return view("index", compact("blogs", "categories"));
    }
    
    public function showblog($id) {
        try {
            $categories = self::pisahkanGanjilGenap(Categories::all());
            $posts = Posts::findOrFail($id);
            return view('blog.index', compact('posts', "categories"));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('home');
        }
    }
}
