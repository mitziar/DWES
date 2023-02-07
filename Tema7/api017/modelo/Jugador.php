<?

class Jugador{
    
    private $codJugador;
    private $nombre;
    private $poscion;
    private $sueldo;
    private $codEquipo;

    public function __construct($codJugador,$nombre,$poscion,$sueldo,$codEquip)
    {
        $this->codJugador = $codJugador;
        $this->nombre = $nombre;
        $this->poscion = $poscion;
        $this->sueldo = $sueldo;
        $this->codEquip = $codEquip;
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