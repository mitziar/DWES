<?php
class Categoria
{
    private $codigo_categoria;
    private $categoria;
    private $activo;

    public function __construct($codigo_categoria, $categoria, $activo)
    {
        $this->codigo_categoria = $codigo_categoria;
        $this->categoria = $categoria;
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
