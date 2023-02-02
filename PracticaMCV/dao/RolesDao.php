<?

class RolesDAO extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from roles;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayRoles = array();
        while($obj = $devuelve->fetchObject()){         
            $rol = new Roles($obj->codigo, $obj->rol);
            array_push($arrayRoles,$usuario);
        }
        return $arrayRoles;

    }
    public static function findById($id){
        $sql = 'select * from roles where codigo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
            $rol = new Roles($obj->codigo, $obj->rol);
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