<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>WhiskyCommunity</title>
</head>
<body>
    @include('common/header')
    <div class="main-body container">
        <div class="row align-items-center m-1">
            <div class="col-6 text-left">
                <h2 class="page-intro">What is WhiskyCommunity?</h2>
                <br>
                <p class="page-intro-content">
                    이 곳, 위스키 커뮤니티(WhiskyCommunity)는 <br>
                    세계 어느 술이면 다 좋은 애주가들이 <br>
                    자신이 아는 위스키의 정보를 공유하고 <br>
                    혼자서 탐구하거나 여럿이 즐길 수 있는 <br>
                    주류 문화 커뮤니티 사이트입니다.
                </p>
                <button class="btn btn-info" onclick="location.href='/whisky/info'">위스키 보러가기</button>
            </div>
            <div class="col-6">
                <img src="{{asset('image/main/KakaoTalk_20231026_193719601.jpg')}}"
                     alt="main_image"
                     class="img-fluid rounded-3">
            </div>
        </div>
    </div>
    @include('common/footer')
</body>
</html>