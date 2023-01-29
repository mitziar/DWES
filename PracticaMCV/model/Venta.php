<?
class Venta{
    private $id;
    private $fecha;
    private $cantidad;
    private $precio;
    private $producto;
    private $usuario;

    public function __construct($id,$fecha,$cantidad,$precio,$producto,$usuario)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
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