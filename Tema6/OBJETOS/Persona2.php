<?php

class Persona2{
    //PROPIEDADES
    private $nombre;
    private $edad;
    private $email;
    public static $id =0;


    public function __construct($nombre,$edad,$email){
        $self::$id =  $self::$id +1;
        $this->edad=$edad;
        $this->nombre=$nombre;
        $this->email=$email;
    }

    public function __destruct(){

        //cuando acaba la ejecucion, PHP usa este método para eliminar las variables: en java recolector de basura.
        //echo "se destruye ".$this;
    }
    public function __get($get){
        return $this->$get;
    }
    public function __set($clave,$valor){
        $this->$clave=$valor;
    }
    public function __toString(){
        return $this->id.": Nombre:".$this->nombre." , Edad: ".$this->edad.", Email:".$this->email."<br>";
    }

    public function __clone(){
    //copida todo igual, menos lo que indique aquí o a mayores lo que indicque aqui
    $this->id=$this->id+1;
    }
}

?>