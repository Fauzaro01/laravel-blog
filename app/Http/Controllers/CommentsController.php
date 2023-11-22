<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Comments;
use App\Models\Posts;

class CommentsController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function store(Request $request) {
        $this->validate($request, [
            "post_id" => "required|max:24",
            "content" => "required|max:255",
        ]);

        try {
            $post = Posts::findOrFail($request->post_id);
            
            $post->comments()->create([
                "id" => Str::random(12),
                "content" => $request->content,
                "user_id" => Auth::user()->id,
                "post_id" => $request->post_id
            ]);
        
            return redirect()->back();
        
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
    }

    public function delete(Request $request, Comments $coment) {
        $coment->delete();
        return redirect()->back();
    }
}
