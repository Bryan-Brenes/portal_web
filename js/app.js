const cajasEvaluaciones = document.querySelectorAll('.caja-evaluacion');
cajasEvaluaciones.forEach(caja => {
    caja.addEventListener('mouseover', () => {
        const lista = caja.querySelector('.lista-evaluaciones');
        lista.classList.add('lista-activa');
    })
    caja.addEventListener('mouseout', () => {
        const lista = caja.querySelector('.lista-evaluaciones');
        lista.classList.remove('lista-activa');
    })
});

const botonModal = document.getElementById('abrirModal')
const ventanaModal = document.getElementById('perfil-modal');
const cerrarModalBtn = document.getElementsByClassName('cerrarModalBtn')[0];

botonModal.addEventListener('click', () => {
    ventanaModal.style.display = 'block';
})

cerrarModalBtn.addEventListener('click', () => {
    ventanaModal.style.display = 'none';
})