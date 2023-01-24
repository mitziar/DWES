<?

class Producto{
    private $codigo;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $ruta;

    public function __construct($codigo,$nombre,$descripcion,$precio,$stock,$ruta)
    {
        $this->codProd = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;        
        $this->precio = $precio;
        $this->stock = $stock;
        $this->img = $ruta;
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