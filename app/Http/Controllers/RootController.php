<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class RootController extends Controller
{ 
    public function root (Request $req) {
        function pisahkanGanjilGenap($array) {
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

        if($req->query('find') != null) {
            $posts = Posts::where('title', 'LIKE', "%$$req->query('find')*%")->get();
        } else {
            $posts = Posts::all();
        }
        
        $blogs = pisahkanGanjilGenap($posts);
        return view("index", compact("blogs"));
    }

}
