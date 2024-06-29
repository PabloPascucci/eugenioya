document.addEventListener('DOMContentLoaded', function() {
    fetch('admin/php/get_banners.php')
        .then(response => response.json())
        .then(banners => {
            const bannerContainer = document.getElementById('banner-container');
            if (banners.length > 0) {
                banners.forEach(banner => {
                    const bannerDiv = document.createElement('div');
                    const bannerImg = document.createElement('img');
                    // Usar la URL directamente desde la base de datos
                    bannerImg.src = `admin/${banner.url_banner}`;
                    bannerImg.alt = `Banner ${banner.tipo_banner}`;
                    bannerDiv.appendChild(bannerImg);
                    bannerContainer.appendChild(bannerDiv);
                });
            } else {
                bannerContainer.innerHTML = '';
            }
        })
        .catch(error => {
            console.error('Error fetching banners:', error);
            document.getElementById('banner-container').innerHTML = '<p>Error cargando los banners.</p>';
        });
});