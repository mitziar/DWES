<?

class Producto{
    private $codProd;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $img;
    private $activo;

    public function __construct($codProd,$nombre,$descripcion,$precio,$stock,$img,$activo)
    {
        $this->codProd = $codProd;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;        
        $this->precio = $precio;
        $this->stock = $stock;
        $this->img = $img;
        $this->activo = $activo;
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