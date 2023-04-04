<?php

class EquipoDAO extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from equipos;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayEquipos = array();
        while($obj = $devuelve->fetchObject()){         
            $equipo = new Equipo($obj->codigo_equipo,$obj->equipo, $obj->caracteristicas, $obj->estado,$obj->imagen, $obj->imagen_QR,$obj->activo,$obj->codigo_categoria);
            array_push($arrayEquipos,$equipo);
        }
        return $arrayEquipos;
    }
    public static function findById($id){
        $sql = 'select * from equipos where codigo_equipo= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $equipo = new Equipo($obj->codigo_equipo,$obj->equipo, $obj->caracteristicas, $obj->estado,$obj->imagen, $obj->imagen_QR,$obj->activo,$obj->codigo_categoria);
            return $equipo;
        }  
        return null;
    }
    public static function delete($id){
        $sql = 'update equipos set activo = 0 where codigo_equipo= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($obj){
         
        $sql1 = 'insert into equipos(equipo,caracteristicas,estado,imagen,imagen_QR,activo,codigo_categoria) values(?,?,?,?,?,?,?)';
        $datos=array($obj->equipo, $obj->caracteristicas, $obj->estado,$obj->imagen, $obj->imagen_QR,$obj->activo,$obj->codigo_categoria);
        $devuelve = parent::ejecuta($sql1,$datos);
        if($devuelve){
            //$fecha=date("Y-m-d"); 
                return true;
            }
        
        return false;
    }
    public static function update($obj){
        $sql = 'update productos set equipo = ?,caracteristicas = ?,estado = ?,imagen=?,imagen_QR=?,activo=?,codigo_categoria=? where codigo_equipo = ? ';
        $datos = array($obj->equipo, $obj->caracteristicas, $obj->estado,$obj->imagen, $obj->imagen_QR,$obj->activo,$obj->codigo_categoria,$obj->codigo_equipo);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() != 0){
            return true;
        }
        return false;
    }
}