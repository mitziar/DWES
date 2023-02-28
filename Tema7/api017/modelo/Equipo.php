<?

class Equipo{

    private $codEquipo;
    private $nombre;
    private $localidad;

    public function __construct($codEquipo,$nombre,$localidad)
    {
        $this->codEquipo = $codEquipo;
        $this->nombre = $nombre;
        $this->localidad = $localidad;
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