<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index() {
        $posts = DB::table('posts')
                    ->limit(10)
                    ->get();
        dd($posts);
        die('you are in index page');
    }

    public function detail($id) {
        $posts = DB::table('posts')
        ->where('id', '=', $id)
        ->get();

        dd($posts);
    }
}
