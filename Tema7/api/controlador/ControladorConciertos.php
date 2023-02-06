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
                case 'PATCH':
                    $this->modificar2();
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
        if (count($recurso)==2){
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
                if(isset($_GET['fecha']) && isset($_GET['ordenF']) && count($_GET)==2){
                    

                }elseif(isset($_GET['fecha']) && count($_GET)==1){

                    $concierto = ConciertoDAO::findByFecha($_GET['fecha']);

                    $data=json_encode($concierto);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                }elseif(isset($_GET['ordenF']) && count($_GET)==1){
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

    public function insertar(){
        //lo que me llega aqui es por porst
        $body = file_get_contents(('php://input'));
        $dato= json_decode($body,true);//me llega un objeto estandar
        if(isset($dato['grupo']) && isset($dato['fecha']) && isset($dato['precio']) && isset($dato['lugar'])){
            $concierto = new Concierto($dato['grupo'],$dato['fecha'],$dato['precio'],$dato['lugar']);
            if(ConciertoDAO::insert($concierto)){
                //ha ido todo bien
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 201 Creado')
                );
            }
            
        }else{
            self::respuesta(
                '',
                array('Content-Type: application/json', 'HTTP/1.1 400 Error JSON no tiene formato correcto, en envio de datos')
            );
        }
        
        $array=get_object_vars($dato);
        

        if(ConciertoDAO::insert($dato)){
            //ha ido todo bien
            self::respuesta(
                '',
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
        //print_r($dato);
    }

    public function modificar(){

        //Puede pasar: 1 o 2 
        $recurso= self::recurso();

        //1.recurso -concietos y nada despues
        if (count($recurso)==3){
            $body = file_get_contents(('php://input'));
            $dato= json_decode($body,true);//me llega un array estandar
            if(isset($dato['grupo']) && isset($dato['fecha']) && isset($dato['precio']) && isset($dato['lugar'])){
                $concierto = new Concierto($dato['grupo'],$dato['fecha'],$dato['precio'],$dato['lugar']);
                $concierto->id = $recurso[2];

                if(ConciertoDAO::update($concierto)){
                    self::respuesta(
                        '',
                        array('Content-Type: application/json', 'HTTP/1.1 201 Modificado')
                    );
                }
            }
        }else{
            self::respuesta(
                '',
                array('Content-Type: application/json', 'HTTP/1.1 400 Error recurso mal formado')
            );
        }
    }


    public function borrar(){

        
        $recurso= self::recurso();

        //1.recurso -concietos y nada despues
        if (count($recurso)==3){
                //si no borra
                if(ConciertoDAO::delete($recurso[2])){
                    self::respuesta(
                        '',
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                }else{
                    self::respuesta(
                        '',
                        array('Content-Type: application/json', 'HTTP/1.1 200 No se ha borrado ninguno')
                    );
                }
            
        }else{
            self::respuesta(
                '',
                array('Content-Type: application/json', 'HTTP/1.1 204 ')
            );
        }
    }


    public function modificar2(){

        $body = file_get_contents('php://input');
        $dato= json_decode($body,true);//me llega un array

        $parametros=get_class_vars('Concierto')

        // foreach($dato as $key => $value) {
        //      if(in_array())
        // } 
         $recurso= self::recurso();

        if (count($recurso)==3){



            $viejo = ConciertoDAO::findById($recurso[2]);

            
            foreach($dato as $key => $value){
                    $viejo->$key = $value;
            }
            if(ConciertoDAO::update($viejo)){
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
            }else{
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 400 Error recurso mal formado') );
            }
        }
    }

}
?>