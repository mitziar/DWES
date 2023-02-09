<?

class SorteoDao extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from sorteo;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayRoles = array();
        while($obj = $devuelve->fetchObject()){         
            $sorteo = new Sorteo($obj->id, $obj->fecha,$obj->n1,$obj->n2, $obj->n3, $obj->n4, $obj->n5);
            array_push($arrayRoles,$sorteo);
        }
        return $arrayRoles;

    }
    public static function findById($id){
        $sql = 'select * from sorteo;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayRoles = array();
        while($obj = $devuelve->fetchObject()){         
            $sorteo = new Sorteo($obj->id, $obj->fecha,$obj->n1,$obj->n2, $obj->n3, $obj->n4, $obj->n5);
            array_push($arrayRoles,$sorteo);
        }
        return $arrayRoles;

    }
    public static function findByFecha($fecha){
        $sql = 'select * from sorteo where fecha = ?;';
        $datos = array($fecha);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $rol = new Sorteo($obj->id, $obj->fecha,$obj->n1, $obj->n2,$obj->n3, $obj->n4, $obj->n5);
            return $rol;
        }  
        return null;
    }
    public static function delete($id){
        $sql = 'delete from roles where codigo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($objeto){
        $sql = 'insert into roles values(?)';
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
        $sql = 'update roles set rol = ? where codigo = ? ';
        $datos = array($objeto->rol,$objeto->codigo);
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
}
?>