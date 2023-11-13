<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/whisky/infoPost.css') }}">
    <title>{{$post->title}}</title>
</head>
<body>
    @include('common/header')
    <div class="d-flex justify-content-center">
        <div class="post-box justify-content-start">
            <div class="d-flex justify-content-end">
                @if(($post->user_id)===($user->id) || ($post->user_id)===('admin'))
                    {{-- <button class="mt-3 ms-2 btn btn-info"
                    type="button" data-bs-toggle="modal" data-bs-target="#infoEditModal">수정</button>
                    <button class="mt-3 ms-2 btn btn-danger" type="submit"
                        value="게시글삭제" data-id="{{$post->id}}" onclick="infoDelete(event)">삭제</button> --}}
                @endif
            </div>
            <div class="border rounded mt-3 p-1 d-flex">
                <span class="fs-3 fw-bold pt-2 pb-2">{{ $post->title }}</span>
            </div>
            <div class="border-bottom mt-3">
                <p class="fs-5 fw-bolder">작성자 : {{ $post->nickname }}</p>
            </div>
            <div class="border rounded mt-4 mb-3">
                <div class="text-center mb-3">
                    @foreach ($post->images as $image)
                        <img class="img-box rounded mt-5" src="{{ asset($image->path) }}">
                    @endforeach
                </div>
                <p class="fs-5 p-3 lh-base">{!! nl2br(e($post->content)) !!}
                </p>
                <div class="d-flex  justify-content-end">
                    <button class="btn btn-dark m-3" onClick="location.href='/whisky/review'">
                        게시물 리스트로
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('whisky/modal/reviewEditModal') --}}
    @include('common/footer')
    {{-- <script src="{{asset('/js/service/post/whisky/info.js')}}"></script> --}}
</body>
</html>