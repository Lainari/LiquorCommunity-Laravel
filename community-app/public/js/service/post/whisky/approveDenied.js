document.querySelectorAll('.btn-danger').forEach(function (button) {
    button.addEventListener('click', function() {
        const postId = this.dataset.id;

        if(confirm('반려하겠습니까?')){
            fetch(`/manager/approve/${postId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(function (response) {
                if (response.ok) {
                    alert('반려 처리 완료');
                    window.location.reload();
                } else {
                    console.log(response)
                    alert('게시물을 삭제하는 데 실패했습니다.');
                }
            });
        }

    });
});
