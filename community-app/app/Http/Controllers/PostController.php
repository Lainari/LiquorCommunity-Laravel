<?php

namespace App\Http\Controllers;

use App\Models\Post;
class PostController extends Controller
{
    // Whisky投稿の総会
    public function whiskyIndex()
    {
        $posts = Post::where('type', 'whisky')->get();
        return response()->json($posts);
    }
}
