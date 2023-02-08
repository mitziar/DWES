<?
class ControladorPadre{
    //comprobar el recurso
    public static function recurso(){
        if(isset($_SERVER['PATH_INFO'])){
            $uri = $_SERVER['PATH_INFO'];//devuelve ''/conciertos
            $uri= explode('/',$uri);//PARA SABER LOS RECURSOS
            return $uri;
        }else{
            //retorno error, pone direccion pero no parametro, no encuentro recurso
            ControladorPadre::respuesta('',array('HTTP/1.1 400 No se ha indicado recurso'));
            return null;

        }
        
    }

    protected function parametros(){//solo pueden usar las clases que hereden

        //$uri = $_SERVER['QUERY_STRING'];//devuelve /conciertos
        $par = $_GET;
        //$uri= explode('/',$uri);//PARA SABER LOS RECURSOS
        return $par;
    }

    public static function respuesta($datos,$httpHeaders=array()){
        foreach ($httpHeaders as $value) {
            header($value);
        }
        echo $datos;//aqui seran json
        exit;
        
    }
}
?>