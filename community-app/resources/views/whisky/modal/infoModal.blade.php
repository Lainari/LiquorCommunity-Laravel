<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="postModalLabel">게시글 작성</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-main" action="/whisky/info" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value="info">
            <input type="hidden" name="nickname" value="{{ $user->nickname }}">
            <div class="form-group">
              <label for="title">제목</label>
              <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
              <label for="content">내용</label>
              <textarea name="content" id="content" required></textarea>
            </div>
            <div class="form-group">
              <label for="image">이미지</label>
              <input type="file" name="images[]" id="image" multiple>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
              <button type="submit" id="post" class="btn btn-primary">저장</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
