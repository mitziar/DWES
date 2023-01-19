<?


class UsuarioDAO extends FactoryBD implements DAO{

    public static function findAll(){
        $sql = 'select * from usuarios;';
        $datos = array();//paso array vacio, porque no necesitas datos para esta consulta
        $devuelve=parent::ejecuta($sql,$datos);

        /**
         * Array de usuarios
         */
        $arrayUsuarios=array();
        while($objeto = $devuelve->fetchObject()){
            // print_r($objeto);
            $usuario = new Usuario ($objeto->usuario,$objeto->clave, $objeto->nombre,$objeto->correo, $objeto->perfil);
            array_push($arrayUsuarios,$usuario);
        }
        return $arrayUsuarios;
    }
    public static function findById($id){
        $sql = 'select * from usuarios where usuario=?;';
        $datos = array($id);//paso array vacio, porque no necesitas datos para esta consulta
        $devuelve=parent::ejecuta($sql,$datos);
        $objeto= $devuelve->fetchObject();
        if($objeto){
            $usuario = new Usuario ($objeto->usuario,$objeto->clave, $objeto->nombre,$objeto->correo, $objeto->perfil);
            return $usuario;
        }
        return null;
    }
    public static function delete($id){
        $sql = 'select * from usuarios where usuario=?;';
        $datos = array($id);//paso array vacio, porque no necesitas datos para esta consulta
        $devuelve=parent::ejecuta($sql,$datos);

        if($devuelve->rowCount()==0){
            return false;
        }
        return null;
    }
    public static function insert($objeto){
        $sql = 'insert into usuarios values (?,?,?,?,?);';
        $objeto = (array)$objeto;//array asociativo, no es numerico, y dará error el ejecuta, por eso hacemos lo siguiente
        $datos= array();
        foreach ($objeto as $att) {
            array_push($datos, $att);
        }
        $devuelve = parent::ejecuta($sql,$datos);
        //print_r($datos);
    }
    public static function update($objeto){
        $sql = 'update usuarios set clave=?,nombre=?,correo=?,perfil=? where usuario=? ;';
        $datos= array($objeto->clave, $objeto->nombre,$objeto->correo,$objeto->perfil,$objeto->usuario);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount()==0){
            return false;
        }
        return true;
    }

    //ES especifico del dao
    public static function valida($user,$pass){
        $sql = 'select * from usuarios where usuario = ? and clave = ?;';
        $pass=sha1($pass);
        $datos = array($user,$pass);//paso array vacio, porque no necesitas datos para esta consulta
        $devuelve=parent::ejecuta($sql,$datos);
        $objeto= $devuelve->fetchObject();
        if($objeto){
            $usuario = new Usuario ($objeto->usuario,$objeto->clave, $objeto->nombre,$objeto->correo, $objeto->perfil);
            return $usuario;
        }
        return null;
    }

}