<?php
class Usuario{
    private $codigo_usuario;
    private $usuario;
    private $clave;
    private $email;
    private $activo;
    private $codigo_rol;

    public function __construct($codigo_usuario,$usuario,$clave,$email,$activo,$codigo_rol)
    {
        $this->codigo_usuario = $codigo_usuario;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->email = $email;
        $this->activo = $activo;
        $this->codigo_rol = $codigo_rol;
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