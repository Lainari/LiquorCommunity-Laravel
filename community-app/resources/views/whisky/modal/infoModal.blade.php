<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form class="form-main" action="/whisky/info" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <label for="title" class="me-2 fs-5 fw-bold col-1">위스키 명</label>
          <input type="text" class="form-control" name="title" id="title" required>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @csrf
            <input type="hidden" name="type" value="info">
            <input type="hidden" name="nickname" value="{{ $user->nickname }}">
            <div class="d-flex form-group justify-content-start align-items-center">
              <label for="image" class="me-2 fs-5 fw-bold col-1">이미지</label>
              <div class="input-group">
                <input class="form-control" type="file" name="image" id="image" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="content" class="fs-5 fw-bold mb-3">내용</label>
              <div class="form-group">
                <label class="fs-6 fw-bold ms-2 mb-2" for="region-category">지역별</label>
                <select class="form-select" aria-label="whisky-region-select">
                  <option selected>지역을 선택해주세요</option>
                  <option value="1">스카치</option>
                  <option value="2">아이리시</option>
                  <option value="3">아메리칸 버번</option>
                  <option value="3">아메리칸 테네시</option>
                  <option value="3">캐나디안</option>
                  <option value="3">재패니스</option>
                  <option value="3">그 외</option>
                </select>
              </div>
              <div class="form-group mb-2">
                <label class="fs-6 fw-bold ms-2 mb-2" for="material-category">재료별</label>
                <select class="form-select" aria-label="whisky-region-select">
                  <option selected>재료를 선택해주세요</option>
                  <option value="1">싱글 몰트</option>
                  <option value="2">블렌디드 몰트</option>
                  <option value="3">그레인 콘</option>
                  <option value="3">그레인 라이</option>
                  <option value="3">그레인 위트</option>
                  <option value="3">블렌디드</option>
                  <option value="3">그 외</option>
                </select>
              </div>
              <div class="form-group">
                <label class="fs-6 fw-bold ms-2 mb-2" for="material-category">도수 (숫자만 입력)</label>
                <input class="form-control mb-2" type="text">
              </div>
              <div class="form-group">
                <label class="fs-6 fw-bold ms-2 mb-2" for="material-category">추가 기재사항</label>
<textarea class="form-control h-10" rows="5" name="content" id="content">
</textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
              <button type="submit" id="post" class="btn btn-primary">저장</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
