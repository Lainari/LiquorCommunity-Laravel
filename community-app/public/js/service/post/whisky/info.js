function infoDelete(event) {
    event.preventDefault();
    var result = confirm('게시글을 삭제하시겠습니까?');
    if (result) {
        var postId = event.target.dataset.id;
        fetch('/whisky/info/post/' + postId, {
            method: 'DELETE',
            credentials: 'include',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({id: postId})
        })
        .then(response => {
            alert('게시글이 삭제되었습니다')
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            window.location.href = '/whisky/info';
        })
        .catch(error => {
            alert('에러가 발생했습니다. 잠시 후 재시도해주세요.')
            console.error('There has been a problem with your fetch operation:', error);
        });
    }
}