(function(){
    let eventos = [];

    const resumen = document.querySelector('#registro-resumen');
    const eventosBoton = document.querySelectorAll('.evento__agregar');
    eventosBoton.forEach(boton => boton.addEventListener('click', seleccionarEvento))
    


    function seleccionarEvento(e){
        // Deshabilitar el evento
        e.target.disabled = true
        eventos = [...eventos, {
            id: e.target.dataset.id,
            titulo: e.target.parentElement.querySelector('.evento__nombre').textContent.trim()
        }]

        mostrarEventos();
    }


    function mostrarEventos(){
        // limpiar el html
        limpiarEventos();


        if(eventos.length > 0){
            eventos.forEach( evento => {
                const eventoDom = document.createElement('DIV');
                eventoDom.classList.add('registro__evento')

                const titulo = document.createElement('H3')
                titulo.classList.add('registro__nombre')
                titulo.textContent = evento.titulo

                const botonEliminar = document.createElement('BUTTON')
                botonEliminar.classList.add('registro__eliminar')
                botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`
                botonEliminar.onclick = function(){
                    eliminarEvento(evento.id)
                }

                // Renderizar en el html
                eventoDom.appendChild(titulo)
                eventoDom.appendChild(botonEliminar)
                resumen.appendChild(eventoDom)

            })
        }
    }


    function eliminarEvento(id){
        eventos = eventos.filter( evento => evento.id !== id)
        const botonAgregar = document.querySelector(`[data-id="${id}"]`) 
        botonAgregar.disabled = false
        
        mostrarEventos();
    }


    function limpiarEventos(){
        while (resumen.firstChild) {
            resumen.removeChild(resumen.firstChild);
        }
    }



})();