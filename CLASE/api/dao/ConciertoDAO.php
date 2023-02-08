<?
require_once './dao/FactoryBD.php';
require_once './dao/DAO.php';

class ConciertoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from conciertos;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
    }
    public static function findById($id)
    {
        $sql = 'select * from conciertos where id = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if ($obj) {
             return $obj;
        }
        return null;
    }

    public static function findByFecha($id)
    {
        $sql = 'select * from conciertos where fecha >= ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
        
    }

    public static function findOrderByFecha($id)
    {
        $sql = 'select * from conciertos order by fecha '.$id.';';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
        
    }
    public static function findByFechaOrder($fecha,$order)
    {
        $sql = 'select * from conciertos where fecha >= ? order by fecha '.$order.';';
        $datos = array($fecha);
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
        
    }
    public static function delete($id)
    {
        $sql = 'delete from conciertos where id = ?';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
    public static function insert($objeto)
    {
        $sql = 'insert into conciertos values (?,?,?,?,?)';
        $objeto = (array)$objeto;
        $datos = array();
        foreach ($objeto as $att) {
            array_push($datos, $att);
        }    
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
    public static function update($obj)
    {
        $sql = 'update conciertos set grupo = ?, fecha = ?, precio=?, lugar = ? where id = ?';
        $datos = array($obj->grupo,$obj->fecha,$obj->precio,$obj->lugar,$obj->id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
}
