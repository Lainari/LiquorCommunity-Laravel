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
            <div class="d-flex justify-content-end me-2">
                @if(($post->user_id)===($user->id) || ($post->user_id)===('admin'))
                    <button class="mt-3 ms-2 btn btn-info"
                    type="button" data-bs-toggle="modal" data-bs-target="#infoEditModal">수정</button>
                    <button class="mt-3 ms-2 btn btn-danger" type="submit"
                        value="게시글삭제" data-id="{{$post->id}}" onclick="infoDelete(event)">삭제</button>
                @endif
            </div>
            <div class="mt-4 mb-3">
                <div class="text-box d-flex">
                    <div class="text-left ms-3 mb-3">
                        @foreach ($post->images as $image)
                            <img class="img-box rounded pt-2 pb-2 mt-5" src="{{ asset($image->path) }}">
                        @endforeach
                    </div>
                    <div class="mt-4 ms-4">
                        <div class="mt-3 p-1 d-flex">
                            <span class="fs-3 fw-bold pt-2 pb-2">{{ $post->title }}</span>
                        </div>
                        <p class="fs-5 mt-3 fw-bolder bg-warning">위스키 기본 정보</p>
                        <div class="mt-4">
                            <p class="fs-5 fw-bolder">지역 : {{ $post->whisky->region }}</p>
                            <p class="fs-5 fw-bolder">재료 : {{ $post->whisky->material }}</p>
                            <p class="fs-5 fw-bolder">도수 : {{ $post->whisky->alcohol }}% Vol.</p>
                        </div>
                        <p class="fs-5 mt-5 fw-bolder bg-warning">추가 설명</p>
                        <p class="fs-5 content" style="width:500px">{!! nl2br(e($post->content)) !!}</p>
                    </div>
                </div>
                <p class="fs-6 me-4 mb-0 fw-bold text-end">작성자 : {{ $post->nickname }}</p>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-dark mb-3 me-3" onClick="location.href='/whisky/info'">
                        게시물 리스트로
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('whisky/modal/infoEditModal')
    @include('common/footer')
    <script src="{{asset('/js/service/post/whisky/info.js')}}"></script>
</body>
</html>