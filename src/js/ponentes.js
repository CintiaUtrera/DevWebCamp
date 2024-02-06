(function(){
    const ponentesInput = document.querySelector('#ponentes');

    if(ponentesInput){
        let ponentes = [];
        let ponentesFiltrados = [];

        const listadoPonentes = document.querySelector('#listado-ponentes');
        const ponenteHidden = document.querySelector('[name=ponente_id]');


        obtenerPonentes();
        ponentesInput.addEventListener('input', buscarPonentes);

        if(ponenteHidden.value){
            (async () => {
                const ponente = await obtenerPonente(ponenteHidden.value);
                const {nombre, apellido} = ponente;
                // Insertar en el HTML
                const ponenteDom = document.createElement('LI');
                ponenteDom.classList.add('listado-ponentes__ponente', 'listado-ponentes__ponente--seleccionado');
                ponenteDom.textContent = `${nombre} ${apellido}`
                listadoPonentes.appendChild(ponenteDom);
            })()
        }

        async function obtenerPonentes(){
            const url =  `/api/ponentes`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            formatearPonentes(resultado);
        }

        async function obtenerPonente(id){
            const url = `/api/ponente?id=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            return resultado;
        }


        function formatearPonentes(arrayPonentes = []){
            ponentes = arrayPonentes.map( ponente => {
                return{
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            })
        }


        function buscarPonentes(e){
            const busqueda = e.target.value;
            
            if(busqueda.length >= 3) {
                const expresion = new RegExp(busqueda.normalize('NFD').replace(/[\u0300-\u036f]/g, ""), "i");
                ponentesFiltrados = ponentes.filter(ponente => {
                    if(ponente.nombre.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().search(expresion) != -1) {
                        return ponente
                    }
                })
            } else {
                ponentesFiltrados = [];
            }

            mostrarPonentes();
        }


        function mostrarPonentes(){
            // eliminar elementos en el HTML 
            while(listadoPonentes.firstChild){
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }

            if(ponentesFiltrados.length > 0){
                ponentesFiltrados.forEach( ponente => {
                    const ponenteHtml = document.createElement('LI');
                    ponenteHtml.classList.add('listado-ponentes__ponente');
                    ponenteHtml.textContent = ponente.nombre;
                    ponenteHtml.dataset.ponenteId = ponente.id;
                    ponenteHtml.onclick = seleccionarPonente
    
                    // Añadir al Dom
                    listadoPonentes.appendChild(ponenteHtml);
                    
                });
            } else{
                const noResultados = document.createElement('P');
                noResultados.classList.add('listado-ponentes__no-resultado');
                noResultados.textContent = "No hay resultados para tu busqueda";
                listadoPonentes.appendChild(noResultados);
            }
            
        }


        function seleccionarPonente(e){
            const ponente = e.target;

            //Remover la clase previa
            const ponentePrevio = document.querySelector('listado-ponentes__ponente--seleccionado');
            if(ponentePrevio){
                ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado');
            }
            ponente.classList.add('listado-ponentes__ponente--seleccionado');
            
            ponenteHidden.value = ponente.dataset.ponenteId;
        
        }


    }
})();