<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/whisky/post.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>위스키 리뷰</title>
</head>
<body>
    @include('common/header')
    <div class="d-flex justify-content-center">
        <div class="feat-box justify-content-end">
            <button class="btn btn-primary create-btn" type="button" data-bs-toggle="modal" data-bs-target="#reviewModal">작성</button>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column" style="width:90%">
            @php
                $approvedPosts = $posts->filter(function($post) {
                    return $post->approve > 0;
                });
            @endphp
            @forelse ($approvedPosts as $post)
                <div class="d-flex">
                    <div class="post justify-content-start mt-3">
                        <a href="/whisky/review/{{ $post->id }}">
                            <img class="img-thumbnail thumbnail mt-1" src="{{ $post->images->first() ? asset($post->images->first()->path) : asset('image/none-image.svg') }}">
                        </a>
                        <div class="m-2">
                            <a class="post-title fs-4 fw-bolder" href="/whisky/review/{{ $post->id }}">{{ $post->title }}</a>
                            <p class="post-writer">작성자 / {{ $post->nickname }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="d-flex align-items-center">
                            @for ($i = 0; $i < $post->star->rating; $i++)
                                <p class="fs-4 pt-2 text-warning">★</p>
                            @endfor
                            @for ($i = 0; $i < (5 - $post->star->rating); $i++)
                                <p class="fs-4 pt-2 text-black text-opacity-25">★</p>
                            @endfor
                        </div>
                    </div>
                </div>
            @empty
                <p class="fs-3 mt-2 fw-bolder">게시물이 존재하지 않습니다</p>
                <p class="fs-5 mb-4">가장 먼저 위스키 리뷰를 등록해보시겠어요?</p>
            @endforelse
        </div>
    </div>

    @include('whisky/modal/reviewModal')
    @include('common/footer')
    <script src="{{ asset('js/reviewPost/index.js') }}"></script>
</body>
</html>