<?
require_once("./Persona2.php");
require_once("./Acciones.php");
class Alumno extends Persona implements Acciones{

    private $curso;

    public function __construct($nombre,$edad,$email){
       parent::__construct($nombre,$edad,$email);
       $this->curso=$curso;
    }

public funstion __toString(){
    //Sobreescribo porque el padre no tiene la propiedad curso
    return parent::$id.": Nombre:".this->nombre.", Edad: ".$this->edad." , Curso: ".$this->curso.", Email: ".$this->email;
}
}

