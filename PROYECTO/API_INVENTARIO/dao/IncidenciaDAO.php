<?php

class IncidenciaDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from incidencias;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayIncidencias = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC))
        {
            array_push($arrayIncidencias, $obj);
        }
        return $arrayIncidencias;
    }
    public static function findById($id)
    {
        $sql = 'select * from incidencias where codigo_incidencia= ?;';
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
        $sql = 'update incidencias set activo = 0 where codigo_incidencia= ?;';
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
        $sql1 = 'insert into incidencias(descripcion,estado,activo,codigo_usuario,codigo_equipo) values(?,?,?,?,?)';
        $datos=array($obj->descripcion, $obj->estado, $obj->activo,$obj->codigo_usuario, $obj->codigo_equipo);
        $devuelve = parent::ejecuta($sql1, $datos);
        if ($devuelve) {
            //$fecha=date("Y-m-d"); 
                return true;
            }
        
        return false;
    }
    public static function update($obj)
    {
        $sql = 'update incidencias set descripcion = ?,estado = ?,activo = ?,codigo_usuario=?,codigo_equipo=? where codigo_incidencia = ?';
        $datos = array($obj->descripcion, $obj->estado, $obj->activo,$obj->codigo_usuario, $obj->codigo_equipo,$obj->codigo_incidencia);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() != 0) {
            return true;
        }
        return false;
    }
}
