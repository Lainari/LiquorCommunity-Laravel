<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Whisky;
use App\Models\Post;
use App\Models\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // 위스키 정보 게시글 생성
    public function infoCreate(Request $request){
        // 위스키정보 이미지 별도 저장
        $path = '';
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $path = $image->store('image/whisky/info', 'public');
            $path = Storage::url($path);
        }
        $post = new Post();
        $post->id = Post::max('id') + 1;
        $post->user_id = auth()->user()->id;
        $post->type = $request->input('type');
        $post->nickname = $request->input('nickname');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        $whisky = new Whisky();
        $whisky->region = $request->input('region');
        $whisky->material = $request->input('material');
        $whisky->alcohol = $request->input('alcohol');
        $whisky->post_id = $post->id;
        $whisky->save();

        $image = new Image();
        $image->post_id = $post->id;
        $image->path = $path;
        $image->save();

        return redirect('/whisky/info');
    }

    // 위스키 정보 게시글별 페이지 로드
    public function infoShow($id){
        $post = Post::find($id);
        $whisky = $post->whisky;
        $images = $post->images;

        if($post === null || $post->type != 'info') {
            abort(404);
        }
        return view('whisky/post/infoPost', ['post' => $post, 'whisky' => $whisky, 'images' => $images]);
    }

    // 위스키 정보 게시글 삭제
    public function infoDestroy($id){
        $post = Post::find($id);

        $whisky = $post->whisky;
        if($whisky){
            $whisky->delete();
        }

        $images = $post->images;
        foreach($images as $image){
            $imagePath = str_replace('/storage/', '', $image->path);
            Storage::disk('public')->delete($imagePath);
            $image->delete();
        }

        $post->delete();
    }


    // 위스키 정보 게시글 수정
    public function infoUpdate(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        $whisky = $post->whisky;
        $whisky->region = $request->input('region');
        $whisky->material = $request->input('material');
        $whisky->alcohol = $request->input('alcohol');
        $whisky->save();

        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $path = $image->store('image/whisky/info', 'public');
            $path = Storage::url($path);

            // 새로운 Image 인스턴스를 만들고 기존의 모든 이미지를 삭제하는 방법
            $oldImages = $post->images;
            foreach($oldImages as $oldImage){
                Storage::disk('public')->delete(str_replace('/storage/', '', $oldImage->path));
                Storage::disk('local')->delete(str_replace('/storage/', '', $oldImage->path));
                $oldImage->delete();
            }

            $newImage = new Image();
            $newImage->post_id = $post->id;
            $newImage->path = $path;
            $newImage->save();
        }

        return redirect('/whisky/info/'.$id);
    }

    // 위스키 리뷰 게시글 생성
    public function reviewCreate(Request $request){
        // 위스키정보 이미지 별도 저장
        $post = new Post();
        $post->id = Post::max('id') + 1;
        $post->user_id = auth()->user()->id;
        $post->type = $request->input('type');
        $post->nickname = $request->input('nickname');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        $star = new Star();
        $star->post_id = $post->id;
        $star->user_id = auth()->user()->id;
        $star->rating = $request->input('rating');
        $star->save();

        $path = '';
        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $image) {
                $path = $image->store('image/whisky/review', 'public');
                $path = Storage::url($path);
        
                $imageModel = new Image();
                $imageModel->post_id = $post->id;
                $imageModel->path = $path;
                $imageModel->save();
            }
        }
        return redirect('/whisky/review');
    }

    // 위스키 리뷰 게시글별 페이지 로드
    public function reviewShow($id){
        $post = Post::find($id);
        $images = $post->images;
        $star = $post->star;

        if($post === null || $post->type != 'review') {
            abort(404);
        }
        return view('whisky/post/reviewPost', ['post' => $post, 'images' => $images, 'star' => $star]);
    }

}
