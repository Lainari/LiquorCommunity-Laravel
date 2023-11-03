export function sendData(nickname, birthday) {
    fetch('/mypage/account/edit', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            nickname: nickname,
            birthday: birthday
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('회원정보 수정 성공!');
            window.location.href = '/mypage/info';
        } else {
            alert('회원정보 수정 실패!');
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}