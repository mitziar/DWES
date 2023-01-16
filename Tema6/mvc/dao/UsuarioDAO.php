<?


class UsuarioDAO extends FactoryBD implements DAO{

    public static function findAll(){
        $sql = 'select * from usuarios;';
        $datos = array();//paso array vacio, porque no necesitas datos para esta consulta
        $devuelve=parent::ejecuta($sql,$datos);
        while($obj = $devuelve->fetchObject()){
            print_r($obj);
        }
    }
    public static function findById($id){

    }
    public static function delete($id){

    }
    public static function insert(){

    }
    public static function update($objeto){

    }

}