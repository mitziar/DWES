<?
require_once("./Persona.php");
class Alumno extends Persona{

    private $curso;

    public function __construct($nombre,$edad,$email,$curso){
       parent::__construct(1,$nombre,$edad,$email);
       $this->curso=$curso;
    }


public function __toString(){//Sobreescribo porque el padre no tiene la propiedad curso
    
    return "$this->$id.: Nombre:".parent::$nombre.", Edad: ".$this->edad." , Curso: ".$this->curso.", Email: ".$this->email;
}
public function darBaja(){
    echo "Dar de baja";
}
}

