<?

class Albaran{
    private $codigo;
    private $fecha;
    private $cantidad;
    private $producto;
    private $usuario;

    public function __construct($codigo,$fecha,$cantidad,$producto,$usuario)
    {
        $this->codigo = $codigo;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;        
        $this->producto = $producto;
        $this->usuario = $usuario;
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