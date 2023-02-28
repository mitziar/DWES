<?

class Jugador{
    
    private $codJugador;
    private $nombre;
    private $posicion;
    private $sueldo;
    private $codEquipo;

    public function __construct($codJugador,$nombre,$posicion,$sueldo,$codEquipo)
    {
        $this->codJugador = $codJugador;
        $this->nombre = $nombre;
        $this->posicion = $posicion;
        $this->sueldo = $sueldo;
        $this->codEquipo = $codEquipo;
    }

    public function __get($get){
        if(property_exists(__CLASS__,$get))
            return $this->$get;
        return null;
    }

    public function __set($clave,$valor){
        if(property_exists(__CLASS__,$clave))
            $this->$clave=$valor;
        
    }
}