<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/whisky/post.css') }}">
    <title>검색 결과</title>
</head>
<body>
    @include('common/header')
    <div id="search-results" class="container">
        @if(count($posts) > 0)
            <p class="fs-3 mt-5 fw-bolder">
                검색된 게시물 수 : {{count($posts)}}개
            </p>
            @foreach($posts as $post)
            <div class="post justify-content-start mt-3">
                <a href="/whisky/info/{{ $post->id }}">
                    <img class="img-thumbnail thumbnail mt-1" src="{{ $post->images->first() ? asset($post->images->first()->path) : asset('image/none-image.svg') }}">
                </a>
                <div class="m-2">
                    <a class="post-title fs-4 fw-bolder" href="/whisky/info/{{ $post->id }}">{{ $post->title }}</a>
                    <p class="post-writer">작성자 / {{ $post->nickname }}</p>
                </div>
            </div>
            @endforeach
        @else
            <p class="fs-3 mt-5 fw-bolder">해당 위스키는 등록되어있지 않습니다</p>
            <p class="fs-5 mb-4">더 많은 위스키나 해당 위스키의 등록을 원하신다면 위스키 정보 페이지을 방문해주세요</p>
            <button class="btn btn-info mb-5" onclick="location.href='/whisky/info'">위스키 보러가기</button>
        @endif
    </div>
    @include('common/footer')
</body>
</html>