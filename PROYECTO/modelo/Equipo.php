<?php
class Equipo{

    private $codigo_equipo;
    private $equipo;
    private $caracteristicas;
    private $estado;
    private $imagen;
    private $imagen_QR;
    private $activo;
    private $codigo_categoria;

    public function __construct($codigo_equipo,$equipo,$caracteristicas,$estado,$imagen,$imagen_QR,$activo,$codigo_categoria)
    {
        $this->codigo_equipo = $codigo_equipo;
        $this->equipo = $equipo;
        $this->caracteristicas = $caracteristicas;
        $this->estado = $estado;
        $this->imagen_QR = $imagen_QR;
        $this->activo = $activo;
        $this->codigo_categoria = $codigo_categoria;
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
?>