const SERVER = "http://localhost:3000";


function pintarBoton(){
    let boton = document.createElement('input');
    boton.setAttribute('id','boton');
    boton.setAttribute('type','button');
    boton.setAttribute('value','Repartir');

    document.getElementById('div03').appendChild(boton);
}

function obtenerCartaAleatoria(){
    return Math.floor(Math.random() * 40) + 1;
}

async function repartir() {
    let aleatoria=obtenerCartaAleatoria();
    const response=await fetch(SERVER+"/naipes/"+aleatoria);
    if(!response.ok){
        throw 'Error'+response.status+"/"+response.statusText;
    }
    const carta=await response.json();
    return carta;
}
async function cambiarLugar(jugador,carta){
    const cartaNuevoLugar=await fetch(SERVER+"/naipes/"+carta["id"],{
        method:'PATCH',
        body: JSON.stringify({ lugar:jugador}),
        headers: {
            'Content-type':'application/json'
        }
    });
    return await cartaNuevoLugar.json();
}
function pintarReparto(jugador,carta){
    switch (jugador){
        case "Jugador 1":
            document.getElementById('divJug1').appendChild(document.createTextNode(carta["carta"]+" de "+carta["palo"]+"| "));
            break;
        case "Jugador 2":
            document.getElementById('divJug2').appendChild(document.createTextNode(carta["carta"]+" de "+carta["palo"]+"| "));
            break;
        case "Jugador 3":
            document.getElementById('divJug3').appendChild(document.createTextNode(carta["carta"]+" de "+carta["palo"]+"| "));
            break;
        case "Jugador 4":
            document.getElementById('divJug4').appendChild(document.createTextNode(carta["carta"]+" de "+carta["palo"]+"| "));
            break;
    }
}
window.addEventListener('load', function () {

    pintarBoton();

    document.getElementById('boton').addEventListener('click', async (event) => {

        event.preventDefault(); // anula lo traía por defecto
        
            let jugadores=["Jugador 1","Jugador 2","Jugador 3","Jugador 4"]
               
            for(let jugador of jugadores){
                        for(let i=0;i<4;i++){
                            let carta;
                            do{
                               carta=await repartir();
                            }while(carta["lugar"]!="mazo")
                            let cambiaLugar = await cambiarLugar(jugador,carta);
                            pintarReparto(jugador,carta);
                            console.log(cambiaLugar);
                        
                        }
            }      
    });
});