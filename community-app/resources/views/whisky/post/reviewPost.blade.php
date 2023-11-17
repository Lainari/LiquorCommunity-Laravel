<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/whisky/postPage.css') }}">
    <title>{{$post->title}}</title>
</head>
<body>
    @include('common/header')
    <div class="d-flex mt-2 justify-content-center mb-3">
        <div class="post-box justify-content-start">
            <div class="d-flex justify-content-end">
                @if(($post->user_id)===($user->id) || ($post->user_id)===('admin'))
                    <button class="mt-3 ms-2 btn btn-info"
                    type="button" data-bs-toggle="modal" data-bs-target="#reviewEditModal">수정</button>
                    {{-- <button class="mt-3 ms-2 btn btn-danger" type="submit"
                        value="게시글삭제" data-id="{{$post->id}}" onclick="infoDelete(event)">삭제</button> --}}
                @endif
            </div>
            <div class="mt-3 ps-3 d-flex">
                <span class="fs-3 fw-bolder pt-2 pb-2">제목 : {{ $post->title }}</span>
            </div>
            <div class="mt-2 ps-3">
                <p class="fs-5 fw-bolder">작성자 : {{ $post->nickname }}</p>
            </div>
            <div class="mt-2 ps-3">
                <span class="fs-3 fw-bolder pt-2 pb-2">평점 : </span>
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
            <div class="mt-2 mb-3">
                <div class="text-center mb-3">
                    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($post->images as $image)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img class="img-box rounded mt-5" src="{{ asset($image->path) }}">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon rounded" style="background-color:black; height:50px;" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon rounded" style="background-color:black; height:50px;" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                <p class="fs-5 p-3 lh-base">{!! nl2br(e($post->content)) !!}
                </p>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-dark m-3" onClick="location.href='/whisky/review'">
                        게시물 리스트로
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('whisky/modal/reviewEditModal')
    @include('common/footer')
    <script src="{{ asset('js/reviewPost/index.js') }}"></script>
    {{-- <script src="{{asset('/js/service/post/whisky/info.js')}}"></script> --}}
</body>
</html>