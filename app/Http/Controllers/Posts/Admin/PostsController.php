<?php

namespace App\Http\Controllers\Posts\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class PostsController extends Controller {
    public function index() {
        // die('admin');
        $posts = DB::table('posts')
                    ->get();
        // if (!empty($posts->items)) {
        return Inertia::render('Admin/Posts/Listing', ['posts'=>$posts]);
    }

    public function create() {
        $post = DB::table('posts')->latest()->first();
        $newPostId = $post->id + 1;
        return Inertia::render('Admin/Posts/Create', ['id'=>$newPostId] );
    }

    public function preview(Request $request) {
        //should add the preview MODAL
        dd($request);
        $postData = $this->validate($request, [

        ]);

        // return Inertia::render()
    }

}
