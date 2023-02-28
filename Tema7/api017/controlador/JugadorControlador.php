
<?

class JugadorControlador extends ControladorPadre
{
    public function controlar()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        switch ($metodo) {
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
                self::respuesta('', array('HTTP/1.1 400 No se ha utilizado el metodo correcto'));

        }
    }

    public function buscar()
    {
        //no acabada la funcion
        $parametros = $this->parametros();
        //recursos equipos y nada despues, '',equipos
        $recurso = self::recurso();
        if (count($recurso) == 2) {
            if (!$parametros) {
                //LISTAR
                $lista = JugadorDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            }else{
                if(isset($_GET['nombre']) && count($_GET)==1){
                    
                    $lista = JugadorDAO::findByNombre($_GET['nombre']);
                    $data = json_encode($lista);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );

                }elseif(isset($_GET['posicion']) && count($_GET)==1){

                    $lista = JugadorDAO::findByPosicion($_GET['posicion']);
                    $data = json_encode($lista);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );

                }elseif(isset($_GET['sueldoMin']) && isset($_GET['sueldoMax']) && count($_GET)==2){

                    $lista = JugadorDAO::findBySueldo($_GET['sueldoMin'],$_GET['sueldoMax']);
                    $data = json_encode($lista);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );

                }
            }
        }elseif (count($recurso) == 3) {

            $jugador = JugadorDAO::findById($recurso[2]);
            $data = json_encode($jugador);
            self::respuesta(
                $data,
                array('Content-Type: application/json', 
                'HTTP/1.1 200 OK')
            );
        }
    }

    public function insertar()
    {
        $body = file_get_contents('php://input');
        $dato = json_decode($body, true);
        if (isset($dato['nombre']) && isset($dato['posicion']) && isset($dato['sueldo']) && isset($dato['codEquipo'])) {
            $jugador = new Jugador(null, $dato['nombre'], $dato['posicion'], $dato['sueldo'], $dato['codEquipo']);
            if (JugadorDAO::insert($jugador)) {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 201 CREADO')
                );
            }
        } else {
            self::respuesta(
                '',
                array('HTTP/1.1 400 Json no tiene un formato correcto')
            );
        }
    }

    public function modificar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            $body = file_get_contents('php://input');
            $dato = json_decode($body, true);
            if (isset($dato['nombre']) && isset($dato['posicion']) && isset($dato['sueldo']) && isset($dato['codEquipo'])) {
                $jugador = new Jugador(null, $dato['nombre'], $dato['posicion'], $dato['sueldo'], intval($dato['codEquipo']));
                $jugador->codJugador = intval($recurso[2]);
                if (JugadorDAO::update($jugador)) {
                    self::respuesta(
                        '',
                        array('Content-Type: application/json', 'HTTP/1.1 201 MODIFICADO')
                    );
                }else{
                    self::respuesta(
                        '',
                        array('Content-Type: application/json',
                         'HTTP/1.1 200 No existe el id a modificar')
                    );
                }
            }
        } else {
            self::respuesta(
                '',
                array('HTTP/1.1 400 El recurso está mal formado /conciertos/{id}')
            );
        }
    }

    public function borrar()
    {
        $recurso = self::recurso();
        if (count($recurso) == 3) {
            //si no borra ninguno
            if (!JugadorDAO::delete($recurso[2])) {
                self::respuesta(
                    '',
                    array('Content-Type: application/json',
                     'HTTP/1.1 204 No se ha borrado ninguno')
                );
            }else{
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 
                    'HTTP/1.1 204 BORRADO')
                );
            }
        } else {
            self::respuesta(
                '',
                array('HTTP/1.1 400 El recurso está mal formado')
            );
        }
    }
}