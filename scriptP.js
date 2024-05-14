// Función para abrir un modal
function abrirModal(tipo) {
    const modal = document.getElementById(`modal-${tipo}`);
    modal.style.display = 'flex';
    document.body.classList.add('modal-open');
}

// Función para cerrar un modal
function cerrarModal(tipo) {
    const modal = document.getElementById(`modal-${tipo}`);
    modal.style.display = 'none';
    document.body.classList.remove('modal-open');
}

// Función para alternar el menú lateral
function toggleMenu() {
    const sidebar = document.getElementById('sidebar');
    const isOpen = sidebar.classList.contains('open');

    if (isOpen) {
        // Si el menú está abierto, ciérralo
        sidebar.classList.remove('open');
        sidebar.style.left = '-250px'; // Ocultar el menú
    } else {
        // Si el menú está cerrado, ábrelo
        sidebar.classList.add('open');
        sidebar.style.left = '0'; // Mostrar el menú
    }
}

// Vincula el evento de clic al botón de apertura del menú
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const closeBtn = document.querySelector('.close-btn');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', toggleMenu);
    }
    
    if (closeBtn) {
        closeBtn.addEventListener('click', toggleMenu);
    }
});
