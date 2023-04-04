<?php

class ControladorUsuario extends ControladorPadre
{
    //busca en la base de datos
    public function controlar()
    {
            //lo que me ha pasado
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
    public function buscar() {
        $parametros= $this->parametros();
        $recurso= self::recurso();

        if (count($recurso) == 2) {
            //si solo hay ""/equipos
            if (!$parametros) {

                $lista = EquipoDAO::findAll();
                $data=json_encode($lista);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            }
        } elseif (count(self::recurso())==3) {
        
            if (is_int($recurso[2])) {
        
                $usuario = UsuarioDAO::findById($recurso[2]);
                $data = json_encode($usuario);
                self::respuesta(
                    $data,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            }
        }
    }

    public function insertar()
    {
        $body = file_get_contents('php://input' );
        $dato= json_decode($body, true);//me llega un objeto estandar
        if(isset($dato['usuario']) && isset($dato['clave']) && isset($dato['email']) && isset($dato['activo']) && isset($dato['codigo_rol'])){
            $usuario = new Usuario(null,$dato['usuario'],$dato['clave'],$dato['email'],$dato['activo'],$dato['codigo_rol']);
            if(UsuarioDao::insert($usuario))
            {
                self::respuesta(
                    '',
                    array('Content-Type: application/json', 'HTTP/1.1 201 Creado')
                );
            }
            
        }else {
            self::respuesta(
                '',
                array('Content-Type: application/json', 'HTTP/1.1 400 Error JSON no tiene formato correcto, en envio de datos')
            );
        }
        
   }
   public function actualizar()
   {
    $body = file_get_contents(('php://input'));
    $dato= json_decode($body, true);//me llega un objeto estandar
    if(isset($dato['codigo_usuario']) && isset($dato['usuario']) && isset($dato['clave']) && isset($dato['email']) && isset($dato['activo']) && isset($dato['codigo_rol'])){
        $usuario =new Usuario($dato['codigo_usuario'], $dato['usuario'], $dato['clave'], $dato['email'], $dato['activo'], $dato['codigo_rol']);
        if (UsuarioDao::update($usuario)) {

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
        if (is_int($recurso[2])) {
           if (EquipoDAO::delete($recurso[2])) {
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
