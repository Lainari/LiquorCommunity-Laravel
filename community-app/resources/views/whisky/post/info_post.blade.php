<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->title}}</title>
</head>
<body>
    @include('common/header')
    <div class="post">
        <h2>제목 : {{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>작성자: {{ $post->nickname }}</p>
        @foreach(json_decode($post->image, true) as $image)
            <img src="{{ asset($image) }}">
        @endforeach
    </div>
    @include('common/footer')
</body>
</html>