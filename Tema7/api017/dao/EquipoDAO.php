<?
require_once './dao/FactoryBD.php';
require_once './dao/DAO.php';

class EquipoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from equipos;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
    }
    public static function findById($id)
    {
        $sql = 'select * from equipos where codEquipo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if ($obj) {
             return $obj;
        }
        return null;
    }

    public static function findByLocalidad($localidad)
    {
        $sql = 'select * from equidpos where localidad = ?;';
        $datos = array($localidad);
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
        
    }


    public static function delete($id)
    {
        $sql = 'delete from equipos where codEquipo = ?';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
    public static function insert($objeto)
    {
        $sql = 'insert into equipos values (?,?)';
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
        $sql = 'update equipos set nombre = ?, localidad = ? where id = ?';
        $datos = array($obj->nombre,$obj->localidad,$obj->id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
}
