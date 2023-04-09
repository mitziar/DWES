<?php

class ControladorEquipo extends ControladorPadre
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
                $this->actualizar();
                break;
            case 'DELETE':
                $this->eliminar();
                break;
            default:
                ControladorPadre::respuesta('', array('HTTP/1.1 400 No se usado el metodo correcto'));
                break;
        }
    }
    public function buscar()
    {
        $parametros = $this->parametros();
        $recurso = self::recurso();

        if (count($recurso) == 2) {

            if (!$parametros) {

                $lista = EquipoDAO::findAll();
                $data = json_encode($lista);
                self::respuesta(
                    $data,
                    array(
                        'Content-Type: application/json',
                        'HTTP/1.1 200 OK'
                    )
                );
            } else {
                if (isset($_GET['filtro'])) {
                    $equipo = EquipoDAO::findByFiltro($_GET['filtro']);

                    $data = json_encode(array($equipo));
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                }elseif (isset($_GET['maxId'])) {
                    $id = EquipoDAO::findMaxId();

                    $data = json_encode(array($id));
                    self::respuesta(
                        $data,
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                }
            }
        } elseif (count(self::recurso()) == 3) {

            if (is_int((int)$recurso[2])) {

                $equipo = EquipoDAO::findById((int)$recurso[2]);
                $data = json_encode(array($equipo));
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            }
        }
    }

    public function insertar()
    {
        $body = file_get_contents('php://input');
        $dato = json_decode($body, true); //me llega un objeto estandar
        if (
            isset($dato['equipo']) && isset($dato['caracteristicas']) && isset($dato['estado'])
            && isset($dato['imagen']) && isset($dato['imagen_QR']) && isset($dato['activo'])
            && isset($dato['codigo_categoria'])
        ) {

            $equipo = new Equipo(
                null,
                $dato['equipo'],
                $dato['caracteristicas'],
                $dato['estado'],
                $dato['imagen'],
                $dato['imagen_QR'],
                $dato['activo'],
                $dato['codigo_categoria']
            );

            if (EquipoDao::insert($equipo)) {

                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 201 Creado')
                );
            }
        } else {
            self::respuesta(
                '',
                array(
                    'Content-Type: application/json',
                    'HTTP/1.1 400 Error JSON no tiene formato correcto, en envio de datos'
                )
            );
        }
    }
    public function actualizar()
    {
        $body = file_get_contents(('php://input'));
        $dato = json_decode($body, true);

        if (
            isset($dato['codigo_equipo']) && isset($dato['equipo']) && isset($dato['caracteristicas'])
            && isset($dato['estado']) && isset($dato['imagen']) && isset($dato['imagen_QR'])
            && isset($dato['activo']) && isset($dato['codigo_categoria'])
        ) {

            $equipo = new Equipo(
                $dato['codigo_equipo'],
                $dato['equipo'],
                $dato['caracteristicas'],
                $dato['estado'],
                $dato['imagen'],
                $dato['imagen_QR'],
                $dato['activo'],
                $dato['codigo_categoria']
            );

            if (EquipoDao::update($equipo)) {

                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 200 Actualizado')
                );
            }
        } else {
            self::respuesta(
                '',
                array('Content-Type: application/json', 'HTTP/1.1 400 Error JSON no tiene formato correcto')
            );
        }
    }
    public function eliminar()
    {
        $recurso = self::recurso();
        if (count(self::recurso()) == 3) {
            if (is_int((int)$recurso[2])) {
                if (EquipoDAO::delete((int)$recurso[2])) {
                    self::respuesta(
                        '',
                        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                    );
                } else {
                    self::respuesta(
                        '',
                        array('Content-Type: application/json', 'HTTP/1.1 400 Error')
                    );
                }
            } else {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 400 Error en el envio de datos')
                );
            }
        }
    }
}
