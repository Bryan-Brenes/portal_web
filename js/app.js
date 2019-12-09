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