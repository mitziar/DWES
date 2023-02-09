<?

class UsuarioDAO extends FactoryBD implements DAO{
    public static function findAll(){
        $sql = 'select * from usuarios;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayUsuarios = array();
        while($obj = $devuelve->fetchObject()){         
            $usuario = new Usuario($obj->id,$obj->usuario, $obj->nombre, $obj->password, $obj->perfil);
            array_push($arrayUsuarios,$usuario);
        }
        return $arrayUsuarios;
    }
    public static function findByID($id){}
    public static function findByUser($usuario){

    }

    public static function delete($id){

    }
    public static function insert($objeto){

    }
    public static function update($objeto){

    }

    public static function valida($user,$pass){
        $sql = 'select * from usuarios where nombre = ? and password = ?;';
        $datos = array($user,$pass);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
             $usuario = new Usuario($obj->id, $obj->nombre, $obj->password,$obj->perfil);
            return $usuario;
        }  
        return null;
    }
}
?>