<?

class AlbaranDao extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from albaran;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayAlbaranes= array();
        while($obj = $devuelve->fetchObject()){         
            $albaran = new Albaran($obj->codigo, $obj->fecha, $obj->cantidad,$obj->producto, $obj->usuario);
            array_push($arrayroAlbaranes,$albaran);
        }
        return $arrayProductos;
    }
    public static function findById($id){
        $sql = 'select * from albaran where codigo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $albaran = new Albaran($obj->codigo, $obj->fecha, $obj->cantidad,$obj->producto, $obj->usuario);
            return $albaran;
        }  
        return null;
    }
    public static function delete($id){
        $sql = 'delete from albaran where codigo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($objeto){
        $sql = 'insert into albaran values(?,?,?,?,?)';
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
        $sql = 'update albaran set fecha = ?,cantidad = ?,producto = ?,usuario=? where codigo = ? ';
        $datos = array($objeto->fecha,$objeto->cantidad,$objeto->producto,$objeto->usuario,$objeto->codigo);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
}