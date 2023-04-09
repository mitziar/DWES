<?php
class Rol{
    private $codigo_rol;
    private $rol;
    private $activo;

    public function __construct($codigo_rol, $rol, $activo)
    {
        $this->codigo_rol = $codigo_rol;
        $this->rol = $rol;
        $this->activo = $activo;
    }
    
    public function __get($get)
    {
        if (property_exists(__CLASS__, $get)) {
             return $this->$get;
        }
           
        return null;
    }

    public function __set($clave, $valor)
    {
        if (property_exists(__CLASS__, $clave)) {
            $this->$clave=$valor;
        }
        
    }
}
