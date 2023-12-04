<div class="modal fade" id="approveModal{{$post->id}}" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <form class="form-main" action="/manager/approve/{{$post->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content">
        <div class="modal-header">
            <label for="title" class="me-2 fs-5 fw-bold col-1" style="width:150px">게시물 내용</label>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        @if ($post->type == 'info')
            <div class="d-flex mt-2 justify-content-center mb-3">
            <div class="justify-content-start">
                    <div class="mt-4 mb-3">
                        <div class="text-box d-flex">
                            <div class="text-left ms-3 mb-3">
                                @foreach ($post->images as $image)
                                    <img class="rounded pt-2 pb-2 mt-5" src="{{ asset($image->path) }}" style="width:85%">
                                @endforeach
                            </div>
                            <div class="mt-4 ms-4">
                                <div class="mt-3 p-1 d-flex">
                                    <span class="fs-3 fw-bold pt-2 pb-2">{{ $post->title }}</span>
                                </div>
                                <p class="fs-5 mt-3 fw-bolder bg-warning">위스키 기본 정보</p>
                                <div class="mt-4">
                                @if($post->whisky)
                                    <p class="fs-5 fw-bolder">지역 : {{ $post->whisky->region }}</p>
                                    <p class="fs-5 fw-bolder">재료 : {{ $post->whisky->material }}</p>
                                    <p class="fs-5 fw-bolder">도수 : {{ $post->whisky->alcohol }}% Vol.</p>
                                @endif
                                </div>
                                <p class="fs-5 mt-5 fw-bolder bg-warning">추가 설명</p>
                                <p class="fs-5 content" style="width:500px">{!! nl2br(e($post->content)) !!}</p>
                            </div>
                        </div>
                        <p class="fs-6 me-4 mb-0 fw-bold text-end">작성자 : {{ $post->nickname }}</p>
                    </div>
                </div>
            </div>
        @else
        <div class="d-flex mt-2 justify-content-center mb-3">
            <div class="justify-content-start">
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
                    <div class="text-center d-flex justify-content-center mb-3">
                        <div id="carousel" class="carousel slide" data-bs-ride="carousel" style="width:80%">
                            <div class="carousel-inner">
                                @foreach ($post->images as $image)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img class="rounded mt-5" src="{{ asset($image->path) }}" style="width:70%">
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
                    <p class="fs-5 p-3 lh-base">{!! nl2br(e($post->content)) !!}</p>
                </div>
            </div>
        </div>
            
        @endif

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            <button type="button" class="btn btn-danger">반려</button>
            <button type="submit" class="btn btn-primary">승인</button>
        </div>
        </div>
    </form>
  </div>
</div>