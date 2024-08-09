// Función para hacer scroll a un elemento especificado por su selector y su instancia
function scrollToElement(elementSelector, instance = 0) {
    const elements = document.querySelectorAll(elementSelector);
    if (elements.length > instance) {
        elements[instance].scrollIntoView({ behavior: 'smooth' });
    }
}

// Asignación de los enlaces a variables
const link1 = document.getElementById("link1");
const link2 = document.getElementById("link2");
const link3 = document.getElementById("link3");

// Añadir eventos de click a los enlaces para hacer scroll a los elementos específicos
link1.addEventListener('click', () => {
    scrollToElement('.header');
});

link2.addEventListener('click', () => {
    scrollToElement('.header', 1);
});

link3.addEventListener('click', () => {
    scrollToElement('.column');
});

// Función para manejar el submenú en el perfil del usuario
document.addEventListener('DOMContentLoaded', function() {
    const menuItem = document.querySelector('.menu-item');
    const submenu = menuItem.querySelector('.submenu');

    menuItem.addEventListener('mouseenter', function() {
        submenu.style.display = 'block';
        setTimeout(function() {
            menuItem.classList.add('show');
        }, 10); // Retraso para activar la transición
    });

    menuItem.addEventListener('mouseleave', function() {
        menuItem.classList.remove('show');
        submenu.addEventListener('transitionend', function() {
            if (!menuItem.classList.contains('show')) {
                submenu.style.display = 'none';
            }
        }, { once: true });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const modeToggleBtn = document.getElementById('mode-toggle');
    const body = document.body;

    modeToggleBtn.addEventListener('click', function() {
        if (body.classList.contains('night-mode')) {
            body.classList.remove('night-mode');
            body.classList.add('day-mode');
            modeToggleBtn.textContent = 'Night mode';
        } else {
            body.classList.remove('day-mode');
            body.classList.add('night-mode');
            modeToggleBtn.textContent = 'Day mode';
        }
    });
});
