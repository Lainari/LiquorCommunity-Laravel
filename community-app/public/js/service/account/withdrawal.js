function withdrawal(event) {

    event.preventDefault();
    var result = confirm('정말로 탈퇴 하시겠습니까?');
    if (result) {
        var userId = event.target.getAttribute('data-id');
        fetch('/mypage/account/withdrawal', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: userId })
        })
        .then(response => {
            alert('탈퇴 처리완료');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            window.location.href = '/mypage/signin';
        })
        .catch(error => {
            alert('에러 발생. 재시도해주세요');
            console.error('There has been a problem with your fetch operation:', error);
        });
    }
}