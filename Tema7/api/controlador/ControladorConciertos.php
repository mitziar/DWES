<?
class ControladorConciertos extends ControladorPadre{
    //busca en la base de datos
    public function controlar(){
            //lo que me ha pasado
        $metodo = $_SERVER['REQUEST_METHOD'];
        switch($metodo){
            case 'GET':
                $this->buscar();
                break;
            case 'POST':
                $this->insertar();
                break;
            case 'PUT':
                $this->modificar();
                break;
            case 'DELETE':
                $this->borrar();
                break;
            default:
                ControladorPadre::respuesta('',array('HTTP/1.1 400 No se usado el metodo correcto'));
                break;
            }
            
    }
    public function buscar(){
        $parametros= $this->parametros();
        //Puede pasar: 1 o 2 
        $recurso= self::recurso();

        //1.recurso -concietos y nada despues
        if (count(self::recurso())==2){
            //si solo hay conciertos devuelve dos, el de antes de la barra y el de espues
            if(!$parametros){
                //Listar sin parametros
                $lista = ConciertoDAO::findAll();
                //print_r($lista);//tengo la lista en array, ahora debo mandar como JSON el recurso al cliente
                $data=json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            
            }else{
                if(isset($_GET['fecha']) && isset($_GET['ordenF'])){
                    

                }elseif(isset($_GET['fecha'])){

                    $concierto = ConciertoDAO::findByFecha($_GET['fecha']);

                    $data=json_encode($concierto);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                }elseif(isset($_GET['ordenF'])){
                    //me los pide ordenadors
                    if($_GET['ordenF'] != 'ASC' && $_GET['ordenF'] != 'DESC'){
                        //responde error si no es ASC o DESC
                        self::respuesta('',array('HTTP/1.1 400 El filtro debe ser ASC o DESC'));
                    }else{
                        $concierto = ConciertoDAO::findOrderByFecha($_GET['ordenF']);

                        $data=json_encode($concierto);
                        self::respuesta(
                            $data,
                            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                        );
                    }
                }else{
                    self::respuesta('',array('HTTP/1.1 400 No se ha utilizado un filtro'));
                }
            }
        }elseif(count(self::recurso())==3){
            //2.conciertos y despues id
            //no tenemoms en cuenta los parametros poruqe se busca por id

            $concierto= ConciertoDAO::findById($recurso[2]);
            $data=json_encode($concierto);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );

        }
        

    }
}
?>