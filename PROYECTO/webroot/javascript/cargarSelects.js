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
    });
    return datosFormateados;
}