<?
require_once './dao/FactoryBD.php';
require_once './dao/DAO.php';

class EquipoDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from equipo;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
    }
    public static function findById($id)
    {
        $sql = 'select * from equipo where codEquipo = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if ($obj) {
            
             return array($obj);
        }
        return null;
    }

    public static function findByLocalidad($localidad)
    {
        $sql = 'select * from equipo where localidad = ?;';
        $datos = array($localidad);
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
        
    }


    public static function delete($id)
    {
        $sql = 'delete from equipo where codEquipo = ?';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
    public static function insert($objeto)
    {
        $sql = 'insert into equipo(nombre,localidad) values (?,?)';
        
        $datos = array($objeto->nombre,$objeto->localidad);

        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
    public static function update($obj)
    {
        $sql = 'update equipo set nombre = ?, localidad = ? where codEquipo = ?';
        $datos = array($obj->nombre,$obj->localidad,$obj->codEquipo);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
}
