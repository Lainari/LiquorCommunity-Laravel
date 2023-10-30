<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/mypage/signup.css') }}">
    <title>Signin</title>
</head>
<body>
    @include('common/header')
    <div class="signup-container">
        <form action="/mypage/signup/" method="post">
            @csrf
            <div class="form-group">
                <label for="id">아이디</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="nickname">닉네임</label>
                <input type="text" id="nickname" name="nickname" required>
            </div>
            <div class="form-group">
                <label for="birthday">생년월일</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <input type="submit" value="회원가입">
        </form>
        <button onclick="location.href='/mypage/signin'">로그인으로 돌아가기</button>
    </div>
    @include('common/footer')
    <script src="{{ asset('js/signup/index.js') }}"></script>
</body>
</html>