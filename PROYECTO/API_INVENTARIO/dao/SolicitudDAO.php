<?php

class SolicitudDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from solicitudes;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arraySolicitudes = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC)) {
    
            array_push($arraySolicitudes, $obj);
        }
        return $arraySolicitudes;
    }
    public static function findById($id)
    {
        $sql = 'select * from solicitudes where codigo_solicitud= ?;';
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
        $sql = 'update solicitudes set activo = 0 where codigo_solicitud= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0)
        {
            return false;
        }
        return true;
    }
    public static function insert($obj)
    {
        $sql1 = 'insert into solicitudes(fecha,estado,activo,codigo_usuario,codigo_equipo) values(?,?,?,?,?)';
        $fecha=date("Y-m-d");
        $datos=array($fecha, $obj->estado, $obj->activo,$obj->codigo_usuario, $obj->codigo_equipo);
        $devuelve = parent::ejecuta($sql1, $datos);
        if ($devuelve) {
                return true;
            }
        
        return false;
    }
    public static function update($obj)
    {
        $sql = 'update solicitudes set fecha = ?,estado = ?,activo = ?,codigo_usuario=?,codigo_equipo=? where codigo_solicitud = ?';
        $datos = array($obj->fecha, $obj->estado, $obj->activo,$obj->codigo_usuario, $obj->codigo_equipo,$obj->codigo_solicitud);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() != 0) {
            return true;
        }
        return false;
    }
}
