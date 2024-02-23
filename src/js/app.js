import './horas.js';
import './ponentes.js';
import './tags.js';
import './slider.js';
import './mapa.js';


window.addEventListener('load', function() {
    paginaActual();
});


function paginaActual() {
    const urlActual = window.location;
    const enlace = document.querySelector(`a[href="${urlActual.pathname}"]`);
    if (enlace) {
        enlace.classList.add('dashboard__enlace--actual');
    }
}
