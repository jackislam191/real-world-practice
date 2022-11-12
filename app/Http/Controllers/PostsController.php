<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index() {
        $posts = DB::table('posts')
                    ->get();
        // if (!empty($posts->items)) {
        return Inertia::render('Posts/Listing', ['posts'=>$posts]);
        // } else {
            // abort(404);
        // }

    }

    public function detail($id) {
        $post = DB::table('posts')
                    ->where('id', '=', $id)
                    ->get();
        // dd($post);
        if (!empty($post->items)) {
            return Inertia::render('Posts/Detail', ['post'=>$post]);
        } else {
            //should not be 404 , it required error page for no data
            abort(404);
        }
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
