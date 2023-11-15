var stars = document.querySelectorAll('.star');
var ratingInput = document.getElementById('rating');

stars.forEach(function(star) {
star.addEventListener('click', function() {
    var value = this.getAttribute('data-value');

    stars.forEach(function(star) {
    if (star.getAttribute('data-value') <= value) {
        star.innerHTML = '<i class="fas fa-star"></i>';
    } else {
        star.innerHTML = '<i class="far fa-star"></i>';
    }
    });

    ratingInput.value = value;
});
});