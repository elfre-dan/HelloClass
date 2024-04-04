const botonDocente = document.getElementById('botonDocent');
const botonEstudiante = document.getElementById('botonEstudiant');
const botonPadre = document.getElementById('botonPadr');

// Agregar eventos de clic a los botones
botonDocente.addEventListener('click', () => { 
    window.location.href = 'loginDocente/index.php';
});

botonEstudiante.addEventListener('click', () => {
    window.location.href = 'loginEstudiantes/index.php';
});

botonPadre.addEventListener('click', () => {
    window.location.href = 'loginAcudiente/index.php';
});