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
        $sql = 'insert into productos values(?,?,?,?,?,?,1)';
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
        $sql = 'update productos set nombre = ?,descripcion = ?,precio = ?,stock=?,ruta=? where codigo = ? ';
        $datos = array($objeto->descripcion,$objeto->nombre,$objeto->precio,$objeto->stock,$objeto->img,$objeto->codProd,);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
}