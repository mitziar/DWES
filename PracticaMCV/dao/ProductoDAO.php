<?

class ProductoDAO extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from productos;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayProductos = array();
        while($obj = $devuelve->fetchObject()){         
            $producto = new Producto($obj->codigo, $obj->nombre, $obj->descripcion,$obj->precio, $obj->stock,$obj->ruta,$obj->activo);
            array_push($arrayProductos,$producto);
        }
        return $arrayProductos;
    }
    public static function findById($id){
        $sql = 'select * from productos where codigo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $producto = new Producto($obj->codigo, $obj->nombre, $obj->descripcion,$obj->precio, $obj->stock,$obj->ruta,$obj->activo);
            return $producto;
        }  
        return null;
    }
    public static function delete($id){
        $sql = 'update productos set activo = 0 where codigo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($objeto){
         
        $sql1 = 'insert into productos(nombre, descripcion, precio, stock,ruta,activo) values(?,?,?,?,?,?)';
        $datos=array($objeto->nombre,$objeto->descripcion,$objeto->precio,$objeto->stock,$objeto->img,$objeto->activo);
        $devuelve = parent::ejecuta($sql1,$datos);
        if($devuelve->rowCount() != 0){
            $sql1 = 'select max(codigo) from productos';
            $datos=array();
            $devuelve = parent::ejecuta($sql1,$datos);
            if($devuelve)
                $max=$devuelve->fetch();
            if($max){
                $fecha=date("Y-m-d"); 
                $datos=array();
                $sql = 'insert into albaran(fecha, cantidad, producto, usuario) values("'.$fecha.'",'.$objeto->stock.','.$max[0].',"'.$_SESSION['user'].'")';
                $devuelve = parent::ejecuta($sql, $datos);
                if($devuelve!= 0){
                    return true;
                }
            }
        }
        return false;
    }
    public static function update($objeto){
        $sql = 'update productos set nombre = ?,descripcion = ?,precio = ?,stock=?,ruta=? where codigo = ? ';
        $datos = array($objeto->nombre,$objeto->descripcion,$objeto->precio,$objeto->stock,$objeto->img,$objeto->codProd);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
}