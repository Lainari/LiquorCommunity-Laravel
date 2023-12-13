document.querySelectorAll('.btn-danger').forEach(function (button) {
    button.addEventListener('click', function() {
        const postId = this.dataset.id;

        if(confirm('승인 대기중이지만, 삭제하겠습니까?')){
            fetch(`/manager/approve/${postId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(function (response) {
                if (response.ok) {
                    alert('삭제 처리 완료');
                    window.location.reload();
                } else {
                    console.log(response)
                    alert('게시물을 삭제하는 데 실패했습니다.');
                }
            });
        }

    });
});
