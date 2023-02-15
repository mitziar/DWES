const SERVER = "http://localhost:3000";


function pintarBoton(){
    let boton = document.createElement('input');
    boton.setAttribute('id','boton');
    boton.setAttribute('type','button');
    boton.setAttribute('value','Iniciar');

    document.getElementById('div03').appendChild(boton);
}

function obtenerCartaAleatoria(){
    return Math.floor(Math.random() * 40) + 1;
}

async function introducirLugar(estado){

    const lugar={
        estado:estado
    }
    const nuevoLugar=await fetch(SERVER+"/lugar",{
        method:'POST',
        body: JSON.stringify(lugar),
        headers: {
            'Content-type':'application/json'
        }
    });
    if(nuevoLugar.ok){
        const nuevoL=await nuevoLugar.json();
        return nuevoL;
    }
}
async function repartir() {
    let aleatoria=obtenerCartaAleatoria();
    const response=await fetch(SERVER+"/naipes"+aleatoria);
    if(!response.ok){
        throw 'Error'+response.status+"/"+response.statusText;
    }
    const carta=await response.json();
    return carta;

}
async function insertCarta(carta){

    const response=await fetch(SERVER+"/naipes",{
        method:'POST',
        body:JSON.stringify(carta),
        headers: {
            'Content-type':'application/json'
        }
    });
    if(!response.ok){
        throw 'Error'+response.status+"/"+response.statusText;
    }
    const cartaInsertada=await response.json();
    return cartaInsertada;
}
async function insertPalo(palo) {
    const response=await fetch(SERVER+"/palos",{
        method:'POST',
        body:JSON.stringify(palo),
        headers: {
            'Content-type':'application/json'
        }
    });
    if(!response.ok){
        throw 'Error'+response.status+"/"+response.statusText;
    }
    const paloInsertado=await response.json();
    return paloInsertado;
}

function anadirNaipe(carta) {
    let naipe=document.createTextNode(carta);
    document.getElementById("div01").appendChild(naipe);
}

window.addEventListener('load', function () {

    pintarBoton();

    document.getElementById('boton').addEventListener('click', async (event) => {

        event.preventDefault(); // anula lo traía por defecto
        
            const palos=[
                {name:"oros"},
                {name:"copas"},
                {name:"espadas"},
                {name:"bastos"}
            ]
             for(let palito of palos){
                 const paloCreado= await insertPalo(palito);
                 for(let i=1;i<11;i++){
                    
                    let carta=
                    {
                        palo:paloCreado["name"],
                        carta:i,
                        lugar:"mazo"
                    }

                    const cartaCreada=await insertCarta(carta);
    
                    anadirNaipe(cartaCreada['carta']+" de "+cartaCreada['palo']+" | ");
                    
                 }
             }
             const estados=["jugador 1","jugador 2","jugador 3","jugador 4","mazo","descartada"];
               
            for(let estado of estados){
                        //const carta=await repartir();
                        //const lugar=await introducirLugar(jugador["name"],carta);
                        const lugar=await introducirLugar(estado);
                        console.log(lugar);
            }      
    });
});