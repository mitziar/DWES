window.addEventListener('load', function() {

    event.preventDefault();

    fetch(URL+'/DWES/PROYECTO/API_INVENTARIO/index.php/categoria')
      .then((response) => {

        if (!response.ok) {
          throw "Error " + response.status + " con texto " + response.statusText;
        }
        return response.json();
      })
      .then((datos) => {

        datos.forEach(element => {

          let opcion = document.createElement("option");
          opcion.value = element.codigo_categoria;
          opcion.innerHTML = element.categoria;

          document.getElementById("idSelectCategoria").append(opcion);
        });
      })
      .catch(error => {
        this.alert('error' + error.statusText)
      });
  });