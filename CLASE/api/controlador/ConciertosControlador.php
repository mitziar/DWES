
<?

class ConciertosControlador extends ControladorPadre
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
                ControladorPadre::respuesta('', array('HTTP/1.1 400 No se ha utilizado el metodo correcto'));
        }
    }

    public function buscar()
    {
        //no acabada la funcion
        $parametros = $this->parametros();
        //recursos conciertos y nada despues
        $recurso = self::recurso();
        if (count($recurso) == 2) {
            if (!$parametros) {
                //LISTAR
                $lista = ConciertoDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                if (isset($_GET['ordenF']) && isset($_GET['fecha']) && count($_GET) == 2) {
                    $concierto = ConciertoDAO::findByFechaOrder($_GET['fecha'], $_GET['ordenF']);
                    $data = json_encode($concierto);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else if (isset($_GET['fecha']) && count($_GET) == 1) {
                    $concierto = ConciertoDAO::findByFecha($_GET['fecha']);
                    $data = json_encode($concierto);
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else if (isset($_GET['ordenF']) && count($_GET) == 1) {
                    if (($_GET['ordenF'] != 'ASC') && ($_GET['ordenF'] != 'DESC')) {
                        self::respuesta(
                            '',
                            array('HTTP/1.1 400 El filtro de fecha debe ser ASC o DESC')
                        );
                    } else {
                        $concierto = ConciertoDAO::findOrderByFecha($_GET['ordenF']);
                        $data = json_encode($concierto);
                        self::respuesta(
                            $data,
                            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                        );
                    }
                } else {
                    self::respuesta(
                        '',
                        array('HTTP/1.1 400 No se ha utilizado un filtro correcto')
                    );
                }
            }
        }
        //coneciertos y despues id
        else if (count($recurso) == 3) {
            $concierto = ConciertoDAO::findById($recurso[2]);
            $data = json_encode($concierto);
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
        if (isset($dato['grupo']) && isset($dato['fecha']) && isset($dato['precio']) && isset($dato['lugar'])) {
            $concierto = new Concierto($dato['grupo'], $dato['fecha'], $dato['precio'], $dato['lugar']);
            if (ConciertoDAO::insert($concierto)) {
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
            if (isset($dato['grupo']) && isset($dato['fecha']) && isset($dato['precio']) && isset($dato['lugar'])) {
                $concierto = new Concierto($dato['grupo'], $dato['fecha'], $dato['precio'], $dato['lugar']);
                $concierto->id = $recurso[2];
                if (ConciertoDAO::update($concierto)) {
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
            if (!ConciertoDAO::delete($recurso[2])) {
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
                array('HTTP/1.1 400 El recurso está mal formado /conciertos/{id}')
            );
        }
    }
}
