<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index() {
        $posts = DB::table('posts')
                    ->limit(10)
                    ->get();
        // dd($posts);
        // die('you are in index page');
        return Inertia::render('Posts/Listing', ['posts'=>$posts]);
    }

    public function detail($id) {
        $post = DB::table('posts')
                    ->where('id', '=', $id)
                    ->get();
        return Inertia::render('Posts/Detail', ['post'=>$post]);
    }

    public function create() {

    }

    // public function listing() {
    //     $posts = DB::table('posts')
    //                 ->limit(10)
    //                 ->get();
    //     dd($posts);
    //     // return Inertia::render('Posts/Listing', ['posts' => $posts]);
    // }
}
