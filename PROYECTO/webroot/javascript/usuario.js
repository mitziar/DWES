const SERVER="http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php";
alert("HOLA");
async function getUsuarios(){

  const datos= await fetch("http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php/usuario");
  if(!datos.ok){
      throw `Error ${datos.status} ${datos.statusText}`
  }
  const datosFormateados= await datos.json();
  return datosFormateados;
}
window.addEventListener('load', function () {

  $('registrarse').addEventListener('submit', (event) => {

      event.preventDefault(); // anula lo traía por defecto

      fetch(`http://192.168.100.136/DWES/PROYECTO/API_INVENTARIO/index.php/usuario`)
          .then((response) => {
              /**comprobar si la respuesta es ok. Primero trato el error !ok */
              if (!response.ok) {
                  throw "Error " + response.status + " con texto " + response.statusText;
              }
              return response.json();//devuelve . Se puede comprobar antes el ok//se pone o return (para enlazar) o el nombre de la callback 
          })
          .then((datos) => {

              datos.forEach(element => {
                  if(element.email==$('email') && element.activo==1){
                    alert ("ya existe usuario");
                  }
              });

          })
          .catch(error => { this.alert('error' + error.statusText) });
  });
});