<?php
class Categoria{
    private $codigo_categoria;
    private $categoria;

    public function __construct($codigo_categoria,$categoria)
    {
        $this->codigo_categoria = $codigo_categoria;
        $this->categoria = $categoria;
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