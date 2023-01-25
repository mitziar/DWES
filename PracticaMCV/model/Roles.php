<?

class Roles{
    private $codigo;
    private $rol;


    public function __construct($codigo,$rol)
    {
        $this->codigo = $codigo;
        $this->rol = $rol;
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