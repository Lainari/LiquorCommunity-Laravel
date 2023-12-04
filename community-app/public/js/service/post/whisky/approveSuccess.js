document.querySelector('.btn-primary').addEventListener('click', function(event) {
    event.preventDefault();

    if (confirm('승인하시겠습니까?')) {
        const form = document.querySelector('.form-main');
        fetch(form.action, {
            method: form.method,
            body: new FormData(form)
        }).then(response => {
            if (response.ok) {
                alert('승인 완료');
                window.location.reload();
            } else {
                throw new Error('서버 응답 오류');
            }
        }).catch(error => {
            console.error('에러 발생:', error);
            alert('에러가 발생했습니다');
        });
    }
});
