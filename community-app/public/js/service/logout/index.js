function logout(event) {

    event.preventDefault();
    var result = confirm('로그아웃 하시겠습니까?');
    if (result) {
        fetch('/mypage/signin/logout', {
            method: 'POST',
            credentials: 'include',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            location.reload();
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
    }
}