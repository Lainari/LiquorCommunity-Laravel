<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/whisky/post.css') }}">
    <title>게시글 승인</title>
</head>
<body>
    @include('common/header')
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column" style="width:90%">
            @foreach ($posts as $post)
            @if ($post->approve == 0)
                <div class="d-flex justify-content-center">
                    <div class="post justify-content-start mt-4">
                            <a data-bs-toggle="modal" href="#approveModal{{$post->id}}">
                                <img class="img-thumbnail thumbnail mt-1" src="{{ $post->images->first() ? asset($post->images->first()->path) : asset('image/none-image.svg') }}">
                            </a>
                            <div class="m-2">
                                <a class="post-title fs-4 fw-bolder" data-bs-toggle="modal" href="#approveModal{{$post->id}}">{{ $post->title }}</a>
                                <p class="post-writer">작성자 / {{ $post->nickname }}</p>
                            </div>
                    </div>
                    @include('manager/modal/approveModal')
                    <div class="d-flex justify-content-end align-items-center mt-4">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#approveModal{{$post->id}}">확인하기</button>
                    </div>
                </div>
            @endif
            @endforeach
            @php
                $unapprovedPosts = $posts->filter(function ($post) {
                    return $post->approve == 0;
                });
                $unapprovedCount = $unapprovedPosts->count();
            @endphp
            @if($unapprovedCount == 0)
                <p class="fs-3 mt-5 fw-bolder">승인 대기 게시물이 존재하지 않습니다</p>
                <p class="fs-5 mb-4">게시글 등록을 먼저 진행해주세요</p>
                <button class="btn btn-info mb-5" onclick="location.href='/whisky/info'">글 쓰러가기</button>
            @endif  
        </div>
    </div>
    <script src="{{asset('/js/service/post/whisky/approveSuccess.js')}}"></script>
    <script src="{{asset('/js/service/post/whisky/approveDenied.js')}}"></script>
    @include('common/footer')
</body>
</html>