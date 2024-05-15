<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\Whisky;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    // Whisky投稿の総会
    public function whiskyIndex()
    {
        $posts = Post::where('type', 'whisky')->with('images')->get();
        return response()->json($posts);
    }
    // Whisky投稿の保存
    public function whiskyStore(Request $request)
    {
        try {
            $post = new Post();
            $post->type = 'whisky';
            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = $request->user_id;
            $post->save();

            $whisky = new Whisky();
            $whisky->post_id = $post->id;
            $whisky->region = $request->region;
            $whisky->alcohol = $request->alcohol;
            $whisky->material = $request->material;
            $whisky->save();

            if ($request->hasFile('images')) {
                $img = new Image();
                $img->post_id = $post->id;
            
                $file = $request->file('images');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('../client/public/images/posts/whisky'), $filename);
                $img->path = '/images/posts/whisky/' . $filename;
                $img->save();
            } else {
                return response()->json(['error' => 'No image file uploaded'], 400);
            }
            return response()->json($post, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
