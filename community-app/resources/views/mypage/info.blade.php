<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/mypage/info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mypage/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/whisky/post.css') }}">
    <title>내 정보</title>
</head>
<body>
    @include('common/header')
    <h2>▶회원 정보◀</h2>
    <div class="info-main">
        <div class="info-container">
            <h3>닉네임</h3><p>{{$user->nickname}}</p>
            <h3>생년월일</h3><p>{{$user->birthday}}</p>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editModal">수정</button>
            @include('mypage/editModal')
            @if (!$user->isAdmin) {{-- 관리자는 회원탈퇴 불가능 --}}
            <button class="btn btn-danger" type="submit" value="회원탈퇴" data-id="{{$user->id}}"
                onclick="withdrawal(event)">회원탈퇴</button>
            @endif
        </div>
    </div>
    <h2>▶작성한 글◀</h2>
    @foreach ($posts as $post)
        @if ($post->approve == 1)
        <div class="d-flex justify-content-center">
            <div class="d-flex" style="width:90%">
                <div class="post justify-content-start mt-4">
                        <a href="/whisky/{{$post->type}}/{{$post->id}}">
                            <img class="img-thumbnail thumbnail mt-1" src="{{ $post->images->first() ? asset($post->images->first()->path) : asset('image/none-image.svg') }}">
                        </a>
                        <div class="m-2">
                            <a class="post-title fs-4 fw-bolder" href="/whisky/{{$post->type}}/{{$post->id}}">{{ $post->title }}</a>
                        </div>
                </div>
                <div class="d-flex justify-content-end align-items-center mt-4">
                    <a class="btn btn-primary" href="/whisky/{{$post->type}}/{{$post->id}}">확인하기</a>
                </div>
            </div>
        </div>
        @endif
    @endforeach
    <h2>▶승인 대기글◀</h2>
    @foreach ($posts as $post)
        @if ($post->approve == 0)
            <div class="d-flex justify-content-center">
                <div class="d-flex" style="width:90%">
                    <div class="post justify-content-start mt-4">
                        <a data-bs-toggle="modal" href="#approveModal{{$post->id}}">
                            <img class="img-thumbnail thumbnail mt-1" src="{{ $post->images->first() ? asset($post->images->first()->path) : asset('image/none-image.svg') }}">
                        </a>
                        <div class="m-2">
                            <a class="post-title fs-4 fw-bolder" data-bs-toggle="modal" href="#approveModal{{$post->id}}">{{ $post->title }}</a>
                            <p class="post-writer">작성자 / {{ $post->nickname }}</p>
                        </div>
                    </div>
                    @include('mypage/modal/waitApproveModal')
                    <div class="d-flex justify-content-end align-items-center mt-4">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#approveModal{{$post->id}}">확인하기</button>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    @include('common/footer')
    <script src="{{asset('/js/service/account/withdrawal.js')}}"></script>
    <script type="module" src="{{ asset('js/service/signup/index.js') }}"></script>
    <script type="module" src="{{ asset('js/signup/index.js') }}"></script>
    <script type="module" src="{{ asset('js/service/account/edit.js') }}"></script>
    <script type="module" src="{{ asset('js/service/post/whisky/approveCancel.js') }}"></script>
</body>
</html>