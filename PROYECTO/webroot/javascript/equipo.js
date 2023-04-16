window.addEventListener('load', function() {

    event.preventDefault(); // anula lo traía por defecto
    fetch('http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php/equipo')
    //fetch(URL+'/DWES/PROYECTO/API_INVENTARIO/index.php/equipo')
        .then((response) => {
            /**comprobar si la respuesta es ok. Primero trato el error !ok */
            if (!response.ok) {
                throw "Error " + response.status + " con texto " + response.statusText;
            }
            return response.json(); //devuelve . Se puede comprobar antes el ok//se pone o return (para enlazar) o el nombre de la callback 
        })
        .then((datos) => {

            datos.forEach(element => {
                let attrs = [
                    element.imagen,
                    element.equipo,
                    element.caracteristicas,
                    element.estado,
                    element.imagen_QR
                ]
                let tr = document.createElement("tr");
                for (let i = 0; i < attrs.length; i++) {
                    if (i == 0) {

                        let td = document.createElement("td");
                        let imagen = this.document.createElement('img');
                        imagen.height = 100;
                        imagen.width = 150;
                        imagen.src = "./webroot/imagenes/" + attrs[i];
                        td.appendChild(imagen);
                        tr.appendChild(td);
                        // document.getElementById("idTabla").append(tr);

                    } else if (i == attrs.length - 1) {

                        let td = document.createElement("td");
                        let imagen = this.document.createElement('img');
                        imagen.src = "./webroot/imagenes_QR/" + attrs[i];
                        imagen.height = 100;
                        imagen.width = 100;
                        td.appendChild(imagen);
                        tr.appendChild(td);


                        let td2 = document.createElement("td");
                        let boton = document.createElement("input");
                        boton.type = "button";
                        boton.value = "Incidencia";
                        boton.name = "incidenciaBoton";
                        boton.className = "btn btn-outline-danger";

                        td2.appendChild(boton);
                        tr.appendChild(td2);


                        let td3 = document.createElement("td");
                        let boton2 = document.createElement("input");
                        boton2.type = "button";
                        boton2.value = "Solicitar";
                        boton2.name = "incidenciaBoton";
                        boton2.className = "btn btn-outline-success";

                        td3.appendChild(boton2);
                        tr.appendChild(td3);
                        document.getElementById("idTabla").append(tr);

                    } else {

                        let td = document.createElement("td");
                        td.innerHTML = attrs[i];
                        tr.appendChild(td);


                    }
                    
                }
                document.getElementById("idTabla").append(tr);

            });

        })
        .catch(error => {
            this.alert('error 1' + error.statusText)
        });
});
