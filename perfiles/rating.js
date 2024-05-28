document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating_value');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-value');
            ratingInput.value = rating;
            stars.forEach(s => s.style.color = '#ccc');
            this.style.color = '#f81';
            star.innerHTML = '&#9733'
        });
    });

    // Tomamos el span para mostrar el rating de las estrellas
    const starElements = document.querySelectorAll('.stars');

        starElements.forEach(starElement => {
            const rating = parseInt(starElement.getAttribute('data-value'));
            starElement.innerHTML = getStars(rating);
        });

        function getStars(rating) {
            let stars = '';
            for (let i = 0; i < 5; i++) {
                stars += i < rating ? '&#9733;' : '&#9734;'; // &#9733; es estrella llena, &#9734; es estrella vacía
            }
            return stars;
        }
});