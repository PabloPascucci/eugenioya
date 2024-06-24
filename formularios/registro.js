document.addEventListener('DOMContentLoaded', function() {
    // Obtener los checkboxes
    let check1 = document.getElementById('check_1');
    let check2 = document.getElementById('check_2');

    // Obtener el botón de envío
    let btnRegistro = document.getElementById('btn_registro');

    // Agregar un evento de escucha para los checkboxes
    check1.addEventListener('change', toggleSubmitButton);
    check2.addEventListener('change', toggleSubmitButton);

    // Función para habilitar o deshabilitar el botón de envío
    function toggleSubmitButton() {
        if (check1.checked && check2.checked) {
            btnRegistro.classList.remove('btn_disabled'); // Remover la clase que desactiva el botón
            btnRegistro.classList.add('inp_sub'); // Agregar la clase del botón
            btnRegistro.removeAttribute('disabled'); // Remover el atributo que desactiva al botón
        } else {
            btnRegistro.classList.remove('inp_sub'); // Remover la clase del botón
            btnRegistro.classList.add('btn_disabled'); // Agregar la clase que desactiva el botón
            btnRegistro.setAttribute('disabled', 'disabled'); // Agregar el atributo que bloquea al botón
        }
    }

    // Habilitar el campo "Profesión/Oficio y telefono"
    let rubro = document.getElementById('rubro');
    let input_oficio = document.getElementById('oficio');
    let input_telefono = document.getElementById('telefono');

    // Inicializar los campos según el valor inicial del select
    toggleInputFields(rubro.value);

    // Agregando una escucha para el cambio de select
    rubro.addEventListener('change', function() {
        toggleInputFields(rubro.value);
    });

    function toggleInputFields(value) {
        if (value === '1') {
            input_oficio.disabled = true; // Deshabilitar el campo de texto
            input_telefono.disabled = true; // Deshabilitar el campo de texto
            input_oficio.classList.remove('inp_form');
            input_oficio.classList.add('inp_disabled');
            input_telefono.classList.remove('inp_form');
            input_telefono.classList.add('inp_disabled');
        } else {
            input_oficio.disabled = false; // Habilitar el campo de texto
            input_telefono.disabled = false; // Habilitar el campo de texto
            input_oficio.classList.remove('inp_disabled');
            input_oficio.classList.add('inp_form');
            input_telefono.classList.remove('inp_disabled');
            input_telefono.classList.add('inp_form');
        }
    }
});