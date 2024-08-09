document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', () => {
        alert(`Has seleccionado a ${card.dataset.name}`);
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
