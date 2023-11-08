<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/whisky/info.css') }}">
    <title>위스키 정보찾기</title>
</head>
<body>
    @include('common/header')

    <div class="d-flex justify-content-center">
        <div class="feat-box justify-content-end">
            <button class="btn btn-primary create-btn" type="button" data-bs-toggle="modal" data-bs-target="#infoModal">작성</button>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        @foreach ($posts as $post)
        <div class="post justify-content-start">
            <a href="/whisky/info/{{ $post->id }}">
                <img class="img-thumbnail thumbnail" src="{{asset($post->image)}}">
            </a>
            <div class="m-2">
                <h3><a class="post-title" href="/whisky/info/{{ $post->id }}">{{ $post->title }}</a></h3>
                <p class="post-writer">작성자 / {{ $post->nickname }}</p>
            </div>
        </div>
        @endforeach
    </div>

    @include('whisky/modal/infoModal')
    @include('common/footer')
</body>
</html>