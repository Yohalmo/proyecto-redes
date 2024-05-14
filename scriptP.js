// Función para abrir un modal
function abrirModal(tipo) {
    const modal = document.getElementById(`modal-${tipo}`);
    modal.style.display = 'block'; // Cambiado de 'flex' a 'block'
    document.body.classList.add('modal-open');
}

// Función para cerrar un modal
function cerrarModal(tipo) {
    const modal = document.getElementById(`modal-${tipo}`);
    modal.style.display = 'none';
    document.body.classList.remove('modal-open');
}

// Evento de clic para abrir el formulario de inicio de sesión
document.getElementById('inicioSesionBtn').addEventListener('click', function() {
    abrirModal('inicioSesion');
});

// Evento de clic para abrir el formulario de registro
document.getElementById('registrarseBtn').addEventListener('click', function() {
    abrirModal('registrarse');
});

// Manejo del envío de formularios de inicio de sesión y registro
document.addEventListener('DOMContentLoaded', function() {
    const iniciarSesionForm = document.getElementById('iniciarSesionForm');
    if (iniciarSesionForm) {
        iniciarSesionForm.addEventListener('submit', function(event) {
            event.preventDefault();
            cerrarModal('inicioSesion');
            // Aquí puedes agregar la lógica para el inicio de sesión
        });
    }

    const registrarseForm = document.getElementById('registrarseForm');
    if (registrarseForm) {
        registrarseForm.addEventListener('submit', function(event) {
            event.preventDefault();
            cerrarModal('registrarse');
            // Aquí puedes agregar la lógica para el registro
        });
    }
});
