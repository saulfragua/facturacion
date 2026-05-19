document.addEventListener('DOMContentLoaded', function(){

    const departamento = document.getElementById('departamento');

    const municipio = document.getElementById('municipio');

    // VALIDAR

    if(!departamento || !municipio){

        return;
    }

    departamento.addEventListener('change', function(){

        const departamento_id = this.value;

        // RESET

        municipio.innerHTML = '';

        // LOADING

        let optionLoading = document.createElement('option');

        optionLoading.text = 'Cargando municipios...';

        municipio.appendChild(optionLoading);

        // VALIDAR

        if(departamento_id === ''){

            municipio.innerHTML = '';

            let option = document.createElement('option');

            option.text = 'Seleccione un departamento';

            municipio.appendChild(option);

            return;
        }

        // FETCH

        fetch(BASE_URL + '/ubicaciones/municipios/' + departamento_id)

        .then(response => response.json())

        .then(data => {

            municipio.innerHTML = '';

            // DEFAULT

            let optionDefault = document.createElement('option');

            optionDefault.value = '';

            optionDefault.text = 'Seleccione municipio';

            municipio.appendChild(optionDefault);

            // MUNICIPIOS

            data.forEach(function(item){

                let option = document.createElement('option');

                option.value = item.id;

                option.text = item.nombre;

                municipio.appendChild(option);

            });

        })

        .catch(error => {

            console.log(error);

            municipio.innerHTML = '';

            let option = document.createElement('option');

            option.text = 'Error cargando municipios';

            municipio.appendChild(option);

        });

    });

});