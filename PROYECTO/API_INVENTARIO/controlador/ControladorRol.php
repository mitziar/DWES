<?php

class ControladorRol extends ControladorPadre
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
        $parametros= $this->parametros();
        $recurso= self::recurso();

        if (count($recurso) == 2) {

            if (!$parametros) {

                $lista = RolDAO::findAll();
                $data=json_encode($lista);
                self::respuesta(
                    $data,
                    array(
                        'Content-Type: application/json',
                        'HTTP/1.1 200 OK')
                );
            }
        } elseif (count(self::recurso())==3) {
        
            if (is_int((int)$recurso[2])) {
        
                $rol = RolDAO::findById((int)$recurso[2]);
                $data = json_encode(array($rol));
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
        $dato= json_decode($body, true);
        if (isset($dato['rol']) && isset($dato['activo'])) {

            $rol = new Rol(
                null,
                $dato['rol'],
                $dato['activo']
            );

            if (RolDao::insert($rol)) {
            
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 201 Creado')
                );
            }
            
        }else {
            self::respuesta(
                '',
                array(
                    'Content-Type: application/json',
                    'HTTP/1.1 400 Error JSON no tiene formato correcto, en envio de datos')
            );
        }
        
   }
   public function actualizar()
   {
    $body = file_get_contents(('php://input'));
    $dato= json_decode($body, true);

    if (isset($dato['codigo_rol']) && isset($dato['rol']) && isset($dato['activo'])) {

        $rol = new Rol(
            $dato['codigo_rol'],
            $dato['rol'],
            $dato['activo']
        );
        
        if (RolDao::update($rol)) {

            self::respuesta(
                '',
                array('Content-Type: application/json', 'HTTP/1.1 200 Actualizado')
            );
        }
        
    }else {
        self::respuesta(
            '',
            array('Content-Type: application/json', 'HTTP/1.1 400 Error JSON no tiene formato correcto')
        );
    }
}
public function eliminar()
{
    $recurso= self::recurso();
    if (count(self::recurso())==3)
    {
        if (is_int((int)$recurso[2])) {
           if (RolDAO::delete((int)$recurso[2])) {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
           }else {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 400 Error')
                );
            }
        }else {
            self::respuesta(
                '',
                array('Content-Type: application/json', 'HTTP/1.1 400 Error en el envio de datos')
            );
        }
    }
}
}
