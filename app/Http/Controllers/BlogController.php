<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function showIndex() {
        return view('blog.index');
    }

    public function showFormBlog() {

        return view('formblog');
    }

    public function createBlog(Request $request) {
        $request->validate($request, [
            'title'=> 'required|min:8|max:100',
            'content' => 'require|min:8|max:500'
        ]);

        
    }
}
