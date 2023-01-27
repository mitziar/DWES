<?

class ConciertoDAO extends FactoryBD implements DAO{

    public static function findAll(){
        $sql = 'select * from conciertos;';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos);
        $arrayC = array();
        while($obj = $devuelve->fetchObject()){         
            $concierto = new Concierto($obj->grupo,$obj->fecha,$obj->precio,$obj->lugar);
            $concierto->id = $obj -> id;
            array_push($arrayC,$concierto);
        }
        return $arrayC;

    }
    public static function findById($id){
        $sql = 'select * from conciertos  where id= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        $obj = $devuelve->fetchObject();
        if($obj){
             $concierto = new Concierto($obj->grupo,$obj->fecha,$obj->precio,$obj->lugar);
             $concierto->id = $obj -> id;
            return $concierto;
        }  
        return null;
    }
    public static function delete($id){
        $sql = 'delete from conciertos  where id= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql,$datos);
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }
    public static function insert($objeto){
        $sql = 'insert into conciertos values (null,?,?,?,?)';
        $objeto = (array) $objeto;
        $datos=array();
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
        $sql = 'update conciertos set grupo = ?, fecha=?, precio=?,luegar=? where id=?';
        $datos = array();
        $devuelve = parent::ejecuta($sql,$datos); 
        if($devuelve->rowCount() == 0){
            return false;
        }
        return true;
    }

}