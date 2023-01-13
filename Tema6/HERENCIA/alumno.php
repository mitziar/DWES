<?
require_once("./Persona2.php")
class Alumno extends Persona{

    private $curso;

    public function __construct($nombre,$edad,$email){
       parent::__construct($nombre,$edad,$email);
       $this->curso=$curso;
    }

public funstion __toString(){
    //Sobreescribo porque el padre no tiene la propiedad curso
    return parent::$id.": Nombre:".this->nombre.", Edad: ".$this->edad." , Curso: ".$this->curso.", Email: ".$this->email;
}
public function darBaja(){
    echo "Dar de baja";
}
}

