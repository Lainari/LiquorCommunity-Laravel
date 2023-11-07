<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // 위스키 정보 게시글 생성
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
        $post->id = Post::max('id') + 1;
        $post->user_id = auth()->user()->id;
        $post->type = $request->input('type');
        $post->nickname = $request->input('nickname');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image = json_encode($paths);
        $post->save();

        return redirect('/whisky/info');
    }

    // 위스키 정보 게시글별 페이지 로드
    public function infoShow($id){
        $post = Post::find($id);
        if($post === null || $post->type != 'info') {
            abort(404);
        }
        return view('whisky/post/infoPost', ['post' => $post]);
    }

    // 위스키 정보 게시글 삭제
    public function infoDestroy($id){
        $post = Post::find($id);
        $images = json_decode($post->image);
        if($images){
            foreach($images as $image) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $image));
                Storage::disk('local')->delete(str_replace('/storage/', '', $image));
            }
        }
        $post->delete();
    }

    public function infoUpdate(Request $request, $id){
        $content = $request->input('content');
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $content;
        if($request->hasfile('images'))
        {
            $paths = [];
            foreach($request->file('images') as $image)
            {
                $path = $image->store('image/whisky/info', 'public');
                $paths[] = Storage::url($path);
            }
            // 새 이미지 업로드 후 기존 이미지 삭제
            $oldImages = json_decode($post->image);
            if($oldImages){
                foreach($oldImages as $image) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $image));
                }
            }
            $post->image = json_encode($paths);
        }
        $post->save();
        return redirect('/whisky/info/'.$id);
    }
}
