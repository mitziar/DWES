<?php

class Persona{
    //PROPIEDADES
    protected $nombre;
    protected $edad;
    protected $email;
    protected $id;


    public function __construct($id,$nombre,$edad,$email){
        $this->id=$id;
        $this->edad=$edad;
        $this->nombre=$nombre;
        $this->email=$email;
    }

    public function __destruct(){

        //cuando acaba la ejecucion, PHP usa este método para eliminar las variables: en java recolector de basura.
        //echo "se destruye ".$this;
    }
    //METODOS
    public function getNombre(){
        return $this->nombre;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setNombre($nombre){
         $this->nombre=$nombre;
    }
    public function setEdad($edad){
        $this->edad=$edad;
   }
   public function setEmail($email){
    $this->email=$email;
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