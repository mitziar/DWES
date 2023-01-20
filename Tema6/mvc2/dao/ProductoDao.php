<?

class ProductoDao extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from producto;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayProductos = array();
        while($obj = $devuelve->fetchObject()){         
            $producto = new Producto($obj->codProd, $obj->nombre, $obj->descripcion,$obj->precio, $obj->stock,$obj->img);
            array_push($arrayProductos,$producto);
        }
        return $arrayUsuarios;

    }
    public static function findById($id){
        $sql = 'select * from producto where codProd= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
             $producto = new Usuario($obj->codProd, $obj->nombre, $obj->descripcion,$obj->precio, $obj->stock,$obj->img);
            return $usuario;
        }  
        return null;
    }
    public static function delete($id){
        $sql = 'delete from producto where codProd = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($objeto){
        $sql = 'insert into producto values(?,?,?,?,?,?)';
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
        $sql = 'update producto set nombre = ?,descripcion = ?,precio=?,stock = ?,img = ? where codProd = ? ';
        $datos = array($objeto->descripcion,$objeto->nombre,$objeto->precio,$objeto->stock,$objeto->img);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }

}