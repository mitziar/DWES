<?php

class RolDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from roles;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayRol = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC)){
        
            array_push($arrayRol, $obj);
        }
        return $arrayRol;
    }
    public static function findById($id)
    {
        $sql = 'select * from roles where codigo_rol= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if ($obj) {

            return $obj;
        }
        return null;
    }
    public static function delete($id)
    {
        $sql = 'update roles set activo = 0 where codigo_rol= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
        
            return false;
        }
        return true;
    }
    public static function insert($obj)
    {
        $sql1 = 'insert into roles(rol,activo) values(?,?)';
        $datos=array($obj->rol,$obj->activo);
        $devuelve = parent::ejecuta($sql1, $datos);
        if ($devuelve) {

                return true;
            }
        
        return false;
    }
    public static function update($obj)
    {
        $sql = 'update roles set rol = ?, activo = ? where codigo_rol = ? ';
        $datos = array($obj->rol,$obj->activo,$obj->codigo_rol);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() != 0) {

            return true;
        }
        return false;
    }
}
