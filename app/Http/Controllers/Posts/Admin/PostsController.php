<?php

namespace App\Http\Controllers\Posts\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;


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
        $postData = $this->validate($request, [
            'id' => 'required|unique:posts',
            'title' => 'required',
        ]);

        if ($postData) {
            DB::table('posts')->insert(
                [
                    'id' => $request->id,
                    'title' => $request->title,
                    'user_id' => 12,
                    'content' => $request->content,
                    'is_published' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

    }

}
