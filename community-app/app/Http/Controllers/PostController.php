<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // 게시글 생성
    public function infoCreate(Request $request){
        // 위스키정보 이미지 별도 저장
        $paths = [];
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $path = $image->store('image/whisky/info', 'public');
                $paths[] = Storage::url($path);
            }
        }

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->type = $request->input('type');
        $post->nickname = $request->input('nickname');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image = json_encode($paths);
        $post->save();

        return redirect('/whisky/info');
    }
}
