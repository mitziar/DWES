<?
class ControladorConciertos extends ControladorPadre{
    //busca en la base de datos
    public function buscar(){
            //lo que me ha pasado
        $metodo = $_SERVER['REQUEST_METHOS'];
        switch($metodo){
            case 'GET':
                buscar();
                break;
            case 'POST':
                insertar();
                break;
            case 'PUT':
                modificar();
                break;
            case 'DELETE':
                borrar();
                break;
            default:
                ControladorPadre::respuesta('',array('HTTP/1.1 400 No se usado el metodo correcto'));
                break;
            }
            
    }
    public function buscar(){
        $parametros= $this->parametros();
    }
}
?>