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
              <input type="file" name="images[]" id="image" multiple>
            </div>
            <div class="form-group mt-3">
              <label for="content" class="fs-5 fw-bold">내용</label>
              <textarea class="form-control h-25" rows="10" name="content" id="content" required>
{{$post->content}}
</textarea>
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
