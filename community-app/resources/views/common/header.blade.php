<header class="header-container">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    >
    <div class="header">
        <a href="/" class="text-decoration-none text-body">
        <div class="d-flex align-items-center">
            <img class="logo" src="{{asset('image/whisky-whiskey-svgrepo-com.svg')}}" alt="logo">
            <h2 class="title">WhiskyCommunity</h2>
        </div>
        </a>
    </div>
    <div class="nav-container">
        <nav class="navbar navbar-expand-lg rounded-3" style="background-color: #cc732d;">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item me-3">
                            <a class="nav-link active" aria-current="page" href="/">홈페이지 소개</a>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                위스키
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/whisky/info">정보</a></li>
                                <li><a class="dropdown-item" href="/whisky/review">리뷰</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                추천장소
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/recommend/bar">바</a></li>
                                <li><a class="dropdown-item" href="/recommend/shop">판매점</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                마이페이지
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if($user)
                                    @if($user->isAdmin)
                                        <li><a class="dropdown-item" href="/manager/approve">게시글 승인</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="/" onclick="logout(event)">로그아웃</a></li>
                                    <li><a class="dropdown-item" href="/mypage/info">내정보</a></li>
                                @else
                                    <li><a class="dropdown-item" href="/mypage/signin">로그인</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="위스키 정보 검색" aria-label="Search">
                        <button class="btn btn-warning" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>

{{-- dropdown 의존성을 위한 jquery와 popper.js 주입 --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/js/service/logout/index.js')}}"></script>