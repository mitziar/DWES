<?php

class UsuarioDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from usuarios;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayUsuarios = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC)) {
            array_push($arrayUsuarios, $obj);
        }
        return $arrayUsuarios;
    }
    public static function findById($id)
    {
        $sql = 'select * from usuarios where codigo_usuario= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if ($obj) {

            return $obj;
        }
        return null;
    }
    public static function findByEmail($email)
    {
        $sql = 'select * from usuarios where email= ?;';
        $datos = array($email);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if ($obj) {

            return $obj;
        }
        return null;
    }
    public static function delete($id)
    {
        $sql = 'update usuarios set activo = 0 where codigo_usuario= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
    public static function insert($obj)
    {
        $sql1 = 'insert into usuarios(usuario,clave,email,activo,codigo_rol) values(?,?,?,?,?)';
        $datos=array($obj->usuario, $obj->clave, $obj->email,$obj->activo, $obj->codigo_rol);
        $devuelve = parent::ejecuta($sql1,$datos);
        if($devuelve){
            //$fecha=date("Y-m-d"); 
                return true;
            }
        
        return false;
    }
    public static function update($obj)
    {
        $sql = 'update usuarios set usuario = ?,clave = ?,email = ?,activo=?,codigo_rol=? where codigo_usuario= ?';
        $datos = array($obj->usuario, $obj->clave, $obj->email,$obj->activo, $obj->codigo_rol,$obj->codigo_usuario);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() != 0){
            return true;
        }
        return false;
    }
    public static function valida($user, $pass)
    {
        $sql = 'select * from usuarios where usuario = ? and clave = ?;';
        $passh = hash('sha512', $pass);
        $datos = array($user,$passh);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if ($obj) {
             $usuario = new Usuario($obj->codigo_usuario,$obj->usuario, $obj->clave, $obj->email,$obj->activo, $obj->codigo_rol);
            return $usuario;
        }
        return null;
    }
}