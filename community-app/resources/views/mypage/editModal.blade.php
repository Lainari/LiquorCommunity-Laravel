<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">회원 정보 수정</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-main" action="/mypage/account/edit" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nickname">닉네임</label>
              <div class="nickname-group">
                <input type="text" class="form-control input" id="nickname" name="nickname" required
                      value="{{$user->nickname}}">
                <button type="button" class="btn btn-dark check-btn"
                    id="nickname_btn">중복 체크</button>
              </div>
              <input type="hidden" id="nickname_check" value="0">
            </div>
            <div class="form-group">
              <label for="birthday">생년월일</label>
              <input type="date" class="form-control input" id="birthday"
                    name="birthday" required onchange="checkAge()" value="{{$user->birthday}}">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
          <button type="submit" id="edit" class="btn btn-primary">저장</button>
        </div>
      </div>
    </div>
</div>