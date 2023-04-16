/*
let miCodigoQR=new QRCode("codigoQR");
document.getElementById("generarCodigo").addEventListener('click', generarQR);
function generarQR(){
    let cadena=document.getElementById("item_txt").value;
   
    if (cadena==""){
        alert("Escribe texto en el input");
        document.getElementById("item_txt").focus()
    } else {
        let dc=document.getElementById('descargarCodigo');
        console.log(dc);
        document.getElementById('descargarCodigo').setAttribute("display", "inline-block");
        console.log(cadena);
        miCodigoQR.makeCode(cadena);
    }
}
*/

let miCodigoQR = new QRCode("codigoQR",{
  text: "",
  width: 100,
  height: 100,
  colorDark: "#ff0055",
  colorLight:"#ddddff"
});

$(document).ready(function(){
  $("#generarCodigo").on("click",async function(){
    let maxId=await generarMaxId();
    
    miCodigoQR.makeCode(maxId);
    $("#descargarCodigo").css("display","inline-block");      
  });

  $("#descargarCodigo").on("click",async function(){
    let maxId=await generarMaxId();
    $("#idInsertarEquipo").css("display","inline-block");
    var base64 = $("#codigoQR img").attr('src');
    $("#descargarCodigo").attr('href', base64);
    $("#descargarCodigo").attr('download', "CodigoQR_"+maxId);
    $("#descargarCodigo").trigger("click");

  });
});

async function generarMaxId(){

    try {
      let maxId;
      const json = await fetch(URL+"/DWES/PROYECTO/API_INVENTARIO/index.php/equipo?maxId");
      const objeto=await json.json();//fetch devuelve un objeto que tiene la propieda json . es de tipo promesa
      objeto.forEach(element => {
               maxId = element.max + 1;
      });
      return maxId;

    } catch (error) {
        console.log(error);
        document.getElementById('p1').innerText=error;
    }
  }


   