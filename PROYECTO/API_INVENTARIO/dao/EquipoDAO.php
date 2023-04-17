<?php

class EquipoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from equipos where activo=1;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayEquipos = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC))
        {
            array_push($arrayEquipos, $obj);
        }
        return $arrayEquipos;
    }
    public static function findById($id)
    {
        $sql = 'select * from equipos where codigo_equipo= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if ($obj) {
        
            return $obj;
        }
        return null;
    }
    public static function findByFiltro($filtro)
    {
        $sql = 'select * from equipos where estado like ? and activo=1;';
        $datos = array($filtro);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        $arrayEquipos = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC))
        {
            array_push($arrayEquipos, $obj);
        }
        return $arrayEquipos;
    }
    public static function findByFiltro2()
    {
        $sql = 'select distinct(estado) from equipos where activo=1;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayEquipos = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC))
        {
            array_push($arrayEquipos, $obj);
        }
        return $arrayEquipos;
    }
    public static function findByFiltro3($filtro)
    {
        $sql = 'select * from equipos where estado like ? and activo=1;';
        $datos = array($filtro);
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayEquipos = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC))
        {
            array_push($arrayEquipos, $obj);
        }
        return $arrayEquipos;
    }
    public static function findByCategoria($categoria)
    {
        $sql = 'select * from equipos where codigo_categoria = ? and activo=1;';
        $datos = array($categoria);
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayEquipos = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC))
        {
            array_push($arrayEquipos, $obj);
        }
        return $arrayEquipos;
    }
    public static function findMaxId()
    {
        $sql = 'select max(codigo_equipo) as max from equipos;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if ($obj) {
        
            return $obj;
        }
        return null;
    }
    public static function delete($id){
        $sql = 'update equipos set activo = 0 where codigo_equipo= ?;';
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
         
        $sql1 = 'insert into equipos(equipo,caracteristicas,estado,imagen,imagen_QR,activo,codigo_categoria) values(?,?,?,?,?,?,?)';
        $datos=array($obj->equipo, $obj->caracteristicas, $obj->estado,$obj->imagen, $obj->imagen_QR,$obj->activo,$obj->codigo_categoria);
        $devuelve = parent::ejecuta($sql1, $datos);
        if ($devuelve) {

                return true;
            }
        
        return false;
    }
    public static function update($obj){
        $sql = 'update equipos set equipo = ?,caracteristicas = ?,estado = ?,imagen=?,imagen_QR=?,activo=?,codigo_categoria=? where codigo_equipo = ? ';
        $datos = array($obj->equipo, $obj->caracteristicas, $obj->estado,$obj->imagen, $obj->imagen_QR,$obj->activo,$obj->codigo_categoria,$obj->codigo_equipo);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() != 0) {
            return true;
        }
        return false;
    }
}
