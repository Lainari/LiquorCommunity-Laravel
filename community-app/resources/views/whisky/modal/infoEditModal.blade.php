<div class="modal fade" id="infoEditModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-main" action="/whisky/info/{{$post->id}}" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <label for="title" class="me-2 fs-5 fw-bold">제목</label>
        <input type="text" name="title" value="{{$post->title}}" id="title" required>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          @csrf
          @method('PUT')
          <input type="hidden" name="type" value="info">
          <input type="hidden" name="nickname" value="{{ $user->nickname }}">
          <div class="d-flex form-group justify-content-start">
            <label for="image" class="me-2 fs-5 fw-bold">이미지</label>
            <div class="input-group">
              <input class="form-control" type="file" name="image" id="image" required>
            </div>
            @foreach($images as $image)
            <input type="hidden" name="old_image_path[]" value="{{ $image->path }}" />
            @endforeach
          </div>
          <div class="form-group mt-3">
            <label for="content" class="fs-5 fw-bold">내용</label>
          </div>
          <div class="form-group">
            <label class="fs-6 fw-bold ms-2 mb-2" for="region-category">지역별</label>
            <select class="form-select" name="region" aria-label="whisky-region-select">
              <option selected>지역을 선택해주세요</option>
              <option value="스카치" {{ $whisky->region == '스카치' ? 'selected' : '' }}>스카치</option>
              <option value="아이리시" {{ $whisky->region == '아이리시' ? 'selected' : '' }}>아이리시</option>
              <optio  value="아메리칸 버번" {{ $whisky->region == '아메리칸 버번' ? 'selected' : ''}}>아메리칸 버번</option>
              <option value="아메리칸 테네시" {{ $whisky->region == '아메리칸 테네시' ? 'selected' : '' }}>아메리칸 테네시</option>
              <option value="캐나디안" {{ $whisky->region == '캐나디안' ? 'selected' : '' }}>캐나디안</option>
              <option value="재패니스" {{ $whisky->region == '재패니스' ? 'selected' : '' }}>재패니스</option>
              <option value="그 외" {{ $whisky->region == '그 외' ? 'selected' : '' }}>그 외</option>
            </select>
          </div>
          <div class="form-group mb-2">
            <label class="fs-6 fw-bold ms-2 mb-2" for="material-category">재료별</label>
            <select class="form-select" name="material" aria-label="whisky-material-select">
              <option selected>재료를 선택해주세요</option>
              <option value="싱글 몰트" {{ $whisky->material == '싱글 몰트' ? 'selected' : '' }}>싱글 몰트</option>
              <option value="블렌디드 몰트" {{ $whisky->material == '블렌디드 몰트' ? 'selected' : '' }}>블렌디드 몰트</option>
              <option value="그레인" {{ $whisky->material == '그레인' ? 'selected' : '' }}>그레인</option>
              <option value="라이(호밀)" {{ $whisky->material == '라이(호밀)' ? 'selected' : '' }}>라이(호밀)</option>
              <option value="콘(옥수수)" {{ $whisky->material == '콘(옥수수)' ? 'selected' : '' }}>콘(옥수수)</option>
              <option value="블렌디드" {{ $whisky->material == '블렌디드' ? 'selected' : '' }}>블렌디드</option>
              <option value="그 외" {{ $whisky->material == '그 외' ? 'selected' : '' }}>그 외</option>
            </select>
          </div>
          <div class="form-group">
            <label class="fs-6 fw-bold ms-2 mb-2" for="alcohol">도수 (숫자만 입력)</label>
            <input class="form-control mb-2" value={{ $whisky->alcohol }} type="text" name="alcohol">
          </div>
          <div class="form-group">
            <label class="fs-6 fw-bold ms-2 mb-2" for="content">추가 기재사항</label>
<textarea class="form-control h-25" rows="10" name="content" id="content">
{{$post->content}}
</textarea>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            <button type="submit" id="post" class="btn btn-primary">저장</button>
          </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
