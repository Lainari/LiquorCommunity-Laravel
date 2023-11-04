<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>위스키 정보찾기</title>
</head>
<body>
    @include('common/header')
    위스키 정보
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#infoModal">작성</button>

    @foreach ($posts as $post)
    <div class="post">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>작성자: {{ $post->nickname }}</p>
        @foreach(json_decode($post->image, true) as $image)
            <img src="{{ asset($image) }}">
        @endforeach
    </div>
    @endforeach

    @include('whisky/modal/infoModal')
    @include('common/footer')
</body>
</html>