
<?

class EquipoControlador extends ControladorPadre
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
                $lista = EquipoDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } 
        }
        
        else if (count($recurso) == 3) {
            $equipo = EquipoDAO::findById($recurso[2]);
            $data = json_encode($equipo);
            self::respuesta(
                $data,
                array('Content-Type: application/json', 
                'HTTP/1.1 200 OK')
            );
        }

        else if (count($recurso) == 4) {
            $jugadores = JugadorDAO::findByEquipo($recurso[2]);
            $data = json_encode($jugadores);
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
        if (isset($dato['nombre']) && isset($dato['localidad'])) {
            $equipo = new Equipo(null, $dato['nombre'], $dato['localidad']);
            if (EquipoDAO::insert($equipo)) {
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
            if (isset($dato['nombre']) && isset($dato['localidad'])) {
                $equipo = new Equipo(null, $dato['nombre'], $dato['localidad']);
                $equipo->codEquipo = $recurso[2];
                if (EquipoDAO::update($equipo)) {
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
            if (!EquipoDAO::delete($recurso[2])) {
                self::respuesta(
                    '',
                    array('Content-Type: application/json',
                     'HTTP/1.1 400 No se ha borrado ninguno')
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
