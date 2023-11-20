document.querySelector('.d-flex').addEventListener('submit', async (event) => {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const response = await fetch(`/whisky/search`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    });
    if (!response.ok) {
        console.error('검색 요청 실패');
        return;
    }
    const posts = await response.json();
    const resultsContainer = document.querySelector('#search-results');
    resultsContainer.innerHTML = '';
    if (posts.length > 0) {
        posts.forEach((post) => {
            resultsContainer.innerHTML += `<p>${post.title}</p>`;
        })
    } else {
        resultsContainer.innerHTML = '<p>검색된 글이 없습니다.</p>';
    }
});
