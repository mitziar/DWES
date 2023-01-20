<?
class Productos{
    private $codProd;
    private $nombre;
    private $descripcion;
    private $precio;
    private $img;

    public function __construct($codProd,$nombre,$descripcion,$descripcion,$perfil)
    {
        $this->codProd = $codProd;
        $this->nombre = $clave;
        $this->descripcion = $descripcion;
        $this->correo = $correo;
        $this->perfil = $perfil;
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
