<?php

class CategoriaDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from categorias where activo = 1;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayCategorias = array();
        while ($obj = $devuelve->fetch(PDO::FETCH_ASSOC))
        {
            array_push($arrayCategorias, $obj);
        }
        return $arrayCategorias;
    }
    public static function findById($id)
    {
        $sql = 'select * from categorias where codigo_categoria= ?;';
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
        $sql = 'update categorias set activo = 0 where codigo_categoria= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
        
            return false;
        }
        return true;
    }
    public static function insert($obj)
    {
        $sql1 = 'insert into categorias(categoria,activo) values(?,?)';
        $datos=array($obj->categoria,$obj->activo);
        $devuelve = parent::ejecuta($sql1, $datos);
        if ($devuelve) {

                return true;
            }
        
        return false;
    }
    public static function update($obj)
    {
        $sql = 'update categorias set categoria = ?, activo = ? where codigo_categoria = ? ';
        $datos = array($obj->categoria,$obj->activo,$obj->codigo_categoria);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() != 0) {

            return true;
        }
        return false;
    }
}
