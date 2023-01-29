<?

class VentaDao extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from venta;';
        $datos=array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayVentas= array();
        while($obj = $devuelve->fetchObject()){         
            $venta = new Venta($obj->id, $obj->fecha, $obj->cantidad,$obj->precio,obj->producto, $obj->usuario);
            array_push($arrayVentas,$venta);
        }
        return $arrayVentas;
    }
    public static function findById($id){
        $sql = 'select * from venta where codigo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $venta = new Venta($obj->id, $obj->fecha, $obj->cantidad,$obj->precio,obj->producto, $obj->usuario);
            return $venta;
        }  
        return null;
    }
    public static function findByUser($user){
        $sql = 'select * from venta where usuario = ?;';
        $datos = array($user);
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayVentas= array();
        while($obj = $devuelve->fetchObject()){         
            $venta = new Venta($obj->id, $obj->fecha, $obj->cantidad,$obj->precio,obj->producto, $obj->usuario);
            array_push($arrayroVentas,$venta);
        }
        return $arrayVentas;
    }
    public static function delete($id){
        $sql = 'delete from venta where codigo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($objeto){
        $sql = 'insert into venta values(?,?,?,?,?,?)';
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
        $sql = 'update venta set fecha = ?,cantidad = ?,precio = ?, producto = ?,usuario=? where codigo = ? ';
        $datos = array($objeto->fecha,$objeto->cantidad,$objeto->precio,$objeto->producto,$objeto->usuario,$objeto->codigo);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function transacionVenta($codigoProducto, $stock){
        $fecha=  date('Y-m-d');
        $sql1='update productos set stock='.$stock.' where codigo = '.$codigoProducto;
        $sql='insert into venta (fecha,cantidad,producto,usuario) values("'.$fecha.'",'.$stock.','.intval($codigoProducto).',"'.$_SESSION['user'].'")';
        $arraySentencias = array ($sql1,$sql);
        $devuelve = parent::ejecutaTransacion($arraySentencias);
        return $devuelve;
    }
}