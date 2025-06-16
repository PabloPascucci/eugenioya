// Este archivo contiene las mecanicas para el carrusel del catalogo

function moverCarrusel(id, direccion) {
    const carrusel = document.getElementById('carrusel-' + id);
    const slides = carrusel.querySelectorAll('.carrusel-slide');
    let actual = Array.from(slides).findIndex(slide => slide.classList.contains('active'));

    slides[actual].classList.remove('active');

    actual = (actual + direccion + slides.length) % slides.length;

    slides[actual].classList.add('active');
}
