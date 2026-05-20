document.addEventListener('DOMContentLoaded', function(){

    // ======================================
    // SELECTS
    // ======================================

    const departamento =
        document.getElementById('departamento');

    const municipio =
        document.getElementById('municipio');

    // ======================================
    // VALIDAR
    // ======================================

    if(!departamento || !municipio){

        return;
    }

    // ======================================
    // CAMBIO DEPARTAMENTO
    // ======================================

    departamento.addEventListener('change', function(){

        const departamento_id = this.value;

        // ======================================
        // RESET
        // ======================================

        municipio.innerHTML = '';

        // ======================================
        // OPTION LOADING
        // ======================================

        let optionLoading =
            document.createElement('option');

        optionLoading.value = '';

        optionLoading.text =
            'Cargando municipios...';

        municipio.appendChild(optionLoading);

        // ======================================
        // VALIDAR
        // ======================================

        if(
            departamento_id === '' ||
            departamento_id === null
        ){

            municipio.innerHTML = '';

            let option =
                document.createElement('option');

            option.value = '';

            option.text =
                'Seleccione un departamento';

            municipio.appendChild(option);

            return;
        }

        // ======================================
        // FETCH
        // ======================================

        fetch(
            BASE_URL +
            '/ubicaciones/municipios/' +
            departamento_id
        )

        .then(response => {

            if(!response.ok){

                throw new Error(
                    'Error obteniendo municipios'
                );
            }

            return response.json();
        })

        .then(data => {

            // ======================================
            // LIMPIAR
            // ======================================

            municipio.innerHTML = '';

            // ======================================
            // DEFAULT
            // ======================================

            let optionDefault =
                document.createElement('option');

            optionDefault.value = '';

            optionDefault.text =
                'Seleccione municipio';

            municipio.appendChild(optionDefault);

            // ======================================
            // VALIDAR DATA
            // ======================================

            if(
                !Array.isArray(data) ||
                data.length === 0
            ){

                let optionEmpty =
                    document.createElement('option');

                optionEmpty.value = '';

                optionEmpty.text =
                    'No hay municipios';

                municipio.appendChild(optionEmpty);

                return;
            }

            // ======================================
            // MUNICIPIOS
            // ======================================

            data.forEach(function(item){

                let option =
                    document.createElement('option');

                // ID REAL
                option.value = item.id;

                // TEXTO
                option.text = item.nombre;

                municipio.appendChild(option);

            });

        })

        .catch(error => {

            console.error(error);

            municipio.innerHTML = '';

            let option =
                document.createElement('option');

            option.value = '';

            option.text =
                'Error cargando municipios';

            municipio.appendChild(option);

        });

    });

});