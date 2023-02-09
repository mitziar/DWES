<?

class ApuestaDao extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from apuesta;';
        $datos=array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayVentas= array();
        while($obj = $devuelve->fetchObject()){         
            $venta = new Apuesta($obj->id, $obj->fecha, $obj->iduser,$obj->n1,$obj->n2, $obj->n3, $obj->n4, $obj->n5);
            array_push($arrayVentas,$venta);
        }
        return $arrayVentas;
    }
    public static function findById($id){
        $sql = 'select * from venta where id = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $venta = new Venta($obj->id, $obj->fecha, $obj->cantidad,$obj->precio,$obj->producto, $obj->usuario);
            return $venta;
        }  
        return null;
    }
    public static function findByUserHoy($user){
        $sql = 'select * from apuesta where fecha ="'.date("Y-m-d").'" and iduser = ? ;';
        $datos = array($user);
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayVentas= array();
        $obj = $devuelve->fetchObject();     
            $apuesta = new Apuesta($obj->id, $obj->fecha, $obj->iduser,$obj->n1,$obj->n2, $obj->n3, $obj->n4, $obj->n5);
   
        return $apuesta;
    }
    public static function delete($id){
        $sql = 'delete from venta where id = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($objeto){
        $sql = 'insert into apuesta(id,fecha,iduser,n1,n2,n3,n4,n5) values(?,?,?,?,?,?,?,?)';
        $objeto = (array)$objeto;
        $datos = array();
        foreach($objeto as $att){
            array_push($datos,$att); 
        }
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function update($objeto){
        $sql = 'update apuesta set n1 = ?, n2 = ?,n3=?, n4 = ?,n5=? where iduser = ? ';
        $datos = array($objeto->n1,$objeto->n2,$objeto->n3,$objeto->n4,$objeto->n5,$objeto->iduser);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function transacionVenta($codigoProducto, $stock,$unidades,$precio){
        $fecha=  date('Y-m-d');
        $sql1='update productos set stock='.$stock.' where codigo = '.$codigoProducto;
        $sql='insert into venta (fecha,cantidad,precio,producto,usuario) values("'.$fecha.'",'.$unidades.','.$precio.','.intval($codigoProducto).',"'.$_SESSION['user'].'")';
        $arraySentencias = array ($sql1,$sql);
        $devuelve = parent::ejecutaTransacion($arraySentencias);
        return $devuelve;
    }
}