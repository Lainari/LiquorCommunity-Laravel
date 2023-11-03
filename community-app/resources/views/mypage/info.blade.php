<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/mypage/info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mypage/modal.css') }}">
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
    @include('common/footer')
    <script src="{{asset('/js/service/account/withdrawal.js')}}"></script>
    <script type="module" src="{{ asset('js/service/signup/index.js') }}"></script>
    <script type="module" src="{{ asset('js/signup/index.js') }}"></script>
    <script type="module" src="{{ asset('js/service/account/edit.js') }}"></script>
</body>
</html>