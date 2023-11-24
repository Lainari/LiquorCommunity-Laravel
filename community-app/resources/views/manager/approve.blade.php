<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시글 승인</title>
</head>
<body>
    @include('common/header')
    @foreach ($posts as $post)
        {{$post->title}}
        <br>
        작성자 / {{$post->user->nickname}}
        <br>
        <br>
    @endforeach
    @include('common/footer')
</body>
</html>