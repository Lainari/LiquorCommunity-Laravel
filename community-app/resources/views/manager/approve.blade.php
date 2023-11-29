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
                <div class="d-flex">
                    <div class="post justify-content-start mt-4">
                            <a data-bs-toggle="modal" href="#approveModal{{$post->id}}">
                                <img class="img-thumbnail thumbnail mt-1" src="{{ $post->images->first() ? asset($post->images->first()->path) : asset('image/none-image.svg') }}">
                            </a>
                            <div class="m-2">
                                <a class="post-title fs-4 fw-bolder" data-bs-toggle="modal" href="#approveModal{{$post->id}}">{{ $post->title }}</a>
                                <p class="post-writer">작성자 / {{ $post->nickname }}</p>
                            </div>
                    </div>
                    @include('whisky/modal/approveModal')
                    <div class="d-flex justify-content-end align-items-center mt-4">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#approveModal{{$post->id}}">확인하기</button>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
    @include('common/footer')
</body>
</html>