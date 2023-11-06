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
            <div class="border rounded mt-3 p-1 d-flex">
                <span class="fs-3 fw-bold pt-2 pb-2">제목 : {{ $post->title }}</span>
            </div>
            <div class="border-bottom mt-3">
                <p class="fs-5 fw-bolder">작성자: {{ $post->nickname }}</p>
            </div>
            <div class="border rounded mt-4">
                <div class="text-center">
                    @foreach(json_decode($post->image, true) as $image)
                        <img class="img-box mt-5" src="{{ asset($image) }}">
                    @endforeach
                </div>
                <p class="fs-5 p-3 lh-base">{{ $post->content }}</p>
            </div>
        </div>
    </div>
    @include('common/footer')
</body>
</html>