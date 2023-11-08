<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form class="form-main" action="/whisky/review" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <label for="title" class="me-2 fs-5 fw-bold col-1">제목</label>
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
                <input class="form-control" type="file" name="images[]" id="image" multiple>
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="content" class="fs-5 fw-bold mb-1">내용</label>
              <textarea class="form-control h-25" rows="10" name="content" id="content" placeholder=
"
☑ 관리자 승인을 위해서는 다음의 사항을 기재해주세요!
--------------------------------------------------------------------------------------------------------------------------------
1. 위스키의 사진은 필수 (사진은 최상단에 기재된 후 내용이 아래에 표기됩니다)
2. 개인적인 리뷰를 지향하므로 자유롭게 기재해도 되지만, 이게 왕도라는 듯한 평가는 반려처리 되므로 주의바랍니다.
3. 리뷰하는 위스키의 정보는 이름은 필수, 그 외에는 선택적으로 올려주시기 바랍니다.
❗ 위 사항에 어긋난 리뷰 게시글은 승인 불가 처리됩니다
--------------------------------------------------------------------------------------------------------------------------------"
required></textarea>
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
