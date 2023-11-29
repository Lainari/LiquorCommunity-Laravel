<div class="modal fade" id="approveModal{{$post->id}}" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <form class="form-main" action="/approve/{{$post->id}}" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <label for="title" class="me-2 fs-5 fw-bold col-1">위스키 명</label>
        <p class="form-control mb-0" name="title" id="title">{{$post->title}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if ($post->type == 'info')
        <div class="d-flex mt-2 justify-content-center mb-3">
          <div class="post-box justify-content-start">
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
          
      @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
        <button type="button" class="btn btn-danger">반려</button>
        <button type="button" class="btn btn-primary">승인</button>
      </div>
    </div>
    </form>
  </div>
</div>