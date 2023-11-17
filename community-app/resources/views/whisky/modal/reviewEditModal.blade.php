<div class="modal fade" id="reviewEditModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <form class="form-main" action="/whisky/review/{{$post->id}}" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <label for="title" class="me-2 fs-5 fw-bold col-1">제목</label>
          <input type="text" class="form-control" value="{{$post->title}}" name="title" id="title" required>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @csrf
            @method('PUT')
            <input type="hidden" name="type" value="review">
            <input type="hidden" name="nickname" value="{{ $user->nickname }}">
            <div class="d-flex form-group justify-content-start align-items-center">
              <label for="image" class="me-2 fs-5 fw-bold col-1">이미지</label>
              <div class="input-group">
                <input class="form-control" type="file" name="images[]" id="image" multiple>
              </div>
              @foreach($images as $image)
              <input type="hidden" name="old_image_path[]" value="{{ $image->path }}" />
             @endforeach
            </div>
            <div class="form-group mt-3">
              <label for="rating" class="fs-5 fw-bold mb-1">평점</label>
              <div class="rating">
                <span class="star" data-value="1"><i class="{{ $post->star->rating >= 1 ? 'fas' : 'far' }} fa-star"></i></span>
                <span class="star" data-value="2"><i class="{{ $post->star->rating >= 2 ? 'fas' : 'far' }} fa-star"></i></span>
                <span class="star" data-value="3"><i class="{{ $post->star->rating >= 3 ? 'fas' : 'far' }} fa-star"></i></span>
                <span class="star" data-value="4"><i class="{{ $post->star->rating >= 4 ? 'fas' : 'far' }} fa-star"></i></span>
                <span class="star" data-value="5"><i class="{{ $post->star->rating >= 5 ? 'fas' : 'far' }} fa-star"></i></span>
                <input type="hidden" name="rating" id="rating" value="{{ $post->star->rating }}" required>
            </div>
            </div>
            <div class="form-group mt-3">
              <label for="content" class="fs-5 fw-bold mb-1">내용</label>
              <textarea class="form-control h-25" rows="10" name="content" id="content" required>
{{$post->content}}</textarea>
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
