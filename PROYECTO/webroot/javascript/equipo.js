
let tipoUsuario = document.getElementById("miDiv").textContent;
let titulosCabeceraTablaUsuario = ["Imagen", "Equipo", "Características", "Estado", "Imagen_QR", "Solicitar"];
//let titulosCabeceraTablaAdmin = ["Imagen","Equipo","Características","Estado","Imagen_QR","Incidencia","Devolver"];

async function getCategorias(elementoSelect) {

    const datos = await fetch(URL + '/DWES/PROYECTO/API_INVENTARIO/index.php/categoria');

    if (!datos.ok) {
        throw `Error ${datos.status} ${datos.statusText}`
    }
    const datosFormateados = await datos.json();
    datosFormateados.forEach(element => {

        let opcion = document.createElement("option");
        opcion.value = element.codigo_categoria;
        opcion.innerHTML = element.categoria;

        document.getElementById(elementoSelect).append(opcion);
        document.getElementById(elementoSelect).addEventListener('change', function () {
            limpiarVista();
            pintarTabla(document.getElementById(elementoSelect).options[document.getElementById(elementoSelect).selectedIndex].innerHTML, document.getElementById(elementoSelect).value);

        });
    });
    return datosFormateados;
}

// async function getSelectOptions() {

//     const datos = await fetch(URL + '/DWES/PROYECTO/API_INVENTARIO/index.php/equipo?distinct');
//     if (!datos.ok) {
//         throw `Error ${datos.status} ${datos.statusText}`
//     }

//     const datosFormateados = await datos.json();
//     datosFormateados.forEach(element => {

//         let opcion = document.createElement("option");
//         opcion.value = element['estado'];
//         opcion.innerHTML = element['estado'];
//         document.getElementById("idBuscar").append(opcion);


//     });
//     document.getElementById("idBuscar").addEventListener('change', async function () {
//         await getDatosTabla(document.getElementById("idBuscar").value);
//     });
// }

async function getDatosTabla(codigo) {

    const datos = await fetch(URL + '/DWES/PROYECTO/API_INVENTARIO/index.php/equipo?categoria=' + codigo);
    if (!datos.ok) {
        throw `Error ${datos.status} ${datos.statusText}`
    }
    const datosFormateados = await datos.json();

    return datosFormateados;

}
function limpiarVista() {
    let miDiv = document.getElementById("contenidoEquipos");
    while (miDiv.firstChild) {
        miDiv.removeChild(miDiv.firstChild);
    }
}

function crearTabla(titulos) {
    let divContenedor = document.createElement("div");
    divContenedor.className = "table-responsive";
    let tabla = document.createElement("table");
    tabla.className = "table";
    divContenedor.appendChild(tabla);

    let cabeceraTabla = document.createElement("thead");
    let filaCabecera = document.createElement("tr");
    titulos.forEach(element => {
        let titulo = document.createElement("th");
        titulo.scope = "col";
        titulo.innerHTML = element;
        filaCabecera.appendChild(titulo);
    });
    cabeceraTabla.appendChild(filaCabecera);
    tabla.appendChild(cabeceraTabla);
    $("#contenidoEquipos").append(tabla);
    return tabla;
}

async function pintarDatosTablaUsuario(tabla, datosFormateados) {

    datosFormateados.forEach(element => {
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


                // let td2 = document.createElement("td");
                // let boton = document.createElement("input");
                // boton.type = "button";
                // boton.value = "Incidencia";
                // boton.name = "incidenciaBoton";
                // boton.className = "btn btn-outline-danger";

                // td2.appendChild(boton);
                // tr.appendChild(td2);


                let td3 = document.createElement("td");
                let boton2 = document.createElement("input");
                boton2.type = "button";
                boton2.value = "Solicitar";
                boton2.name = "incidenciaBoton";
                boton2.className = "btn btn-outline-success";

                td3.appendChild(boton2);
                tr.appendChild(td3);
                tabla.append(tr);

            } else {

                let td = document.createElement("td");
                td.innerHTML = attrs[i];
                tr.appendChild(td);
            }

        }
        tabla.append(tr);

    });
}
async function pintarTabla(categoria, codigoCategoria) {

    let titulo = document.createElement("h4");
    titulo.innerHTML = categoria + " disponibles";
    document.getElementById("contenidoEquipos").appendChild(titulo);
    let tabla = crearTabla(titulosCabeceraTablaUsuario);
    let datosTabla = await getDatosTabla(codigoCategoria);
    pintarDatosTablaUsuario(tabla, datosTabla);
}
window.addEventListener('load', async function () {
    event.preventDefault(); // anula lo traía por defecto
    if (tipoUsuario == 2) {

        this.document.getElementById("idNuevoEquipo").style.display='none';
        const categorias = await getCategorias("idBuscar");
        categorias.forEach(async element => {
            pintarTabla(element.categoria, element.codigo_categoria)
        });

    }

});