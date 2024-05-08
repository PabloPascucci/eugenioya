document.addEventListener('DOMContentLoaded', function() {
    // Obtener los checkboxes
    var check1 = document.getElementById('check_1');
    var check2 = document.getElementById('check_2');

    // Obtener el botón de envío
    var btnRegistro = document.getElementById('btn_registro');

    // Agregar un evento de escucha para los checkboxes
    check1.addEventListener('change', toggleSubmitButton);
    check2.addEventListener('change', toggleSubmitButton);

    // Función para habilitar o deshabilitar el botón de envío
    function toggleSubmitButton() {
        if (check1.checked && check2.checked) {
            btnRegistro.classList.remove('btn_disabled'); // Remover la clase que desactiva el botón
            btnRegistro.classList.add('inp_sub');
            btnRegistro.removeAttribute('disabled');
        } else {
            btnRegistro.classList.remove('inp_sub');
            btnRegistro.classList.add('btn_disabled'); // Agregar la clase que desactiva el botón
            btnRegistro.setAttribute('disabled','disabled');
        }
    }
});
