<?
require_once './dao/FactoryBD.php';
require_once './dao/DAO.php';

class JugadorDAO extends FactoryBD implements DAO
{
    public static function findAll()
    {
        $sql = 'select * from jugador;';
        $datos = array();
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
    }

    public static function findById($id)
    {
        $sql = 'select * from jugador where codJugador = ?;';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetch(PDO::FETCH_ASSOC);
        if ($obj) {
             return array($obj);
        }
        return null;
    }

    public static function findByEquipo($codEquipo)
    {
        $sql = 'select * from jugador where codEquipo = ?;';
        $datos = array($codEquipo);
        $devuelve = parent::ejecuta($sql, $datos);
        $arrayC = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        return $arrayC;
        
    }
    public static function findByNombre($nombre)
    {
        $sql = 'select * from jugador where nombre LIKE ?;';
        $datos = array("%".$nombre."%");
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        if ($obj) {
             return $obj;
        }
        return null;
    }
    public static function findByPosicion($posicion)
    {
        $sql = 'select * from jugador where posicion LIKE ?;';
        $datos = array('%'.$posicion."%");
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        if ($obj) {
             return $obj;
        }
        return null;
    }
    public static function findBySueldo($sueldoMin,$sueldoMax)
    {
        $sql = 'select * from jugador where sueldo BETWEEN ? AND ?;';
        $datos = array($sueldoMin,$sueldoMax);
        $devuelve = parent::ejecuta($sql, $datos);
        $obj = $devuelve->fetchAll(PDO::FETCH_ASSOC);
        if ($obj) {
             return $obj;
        }
        return null;
    }

    public static function delete($id)
    {
        $sql = 'delete from jugador where codJugador = ?';
        $datos = array($id);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
    public static function insert($objeto)
    {
        $sql = 'insert into jugador(nombre,posicion,sueldo,codEquipo) values (?,?,?,?)';
        
        $datos = array($objeto->nombre,$objeto->posicion,$objeto->sueldo,$objeto->codEquipo);

        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
    public static function update($obj)
    {
        $sql = 'update jugador set nombre = ?, posicion = ?, sueldo = ?, codEquipo=? where codJugador = ?';
        $datos = array($obj->nombre,$obj->posicion,$obj->sueldo,$obj->codEquipo,$obj->codJugador);
        $devuelve = parent::ejecuta($sql, $datos);
        if ($devuelve->rowCount() == 0) {
            return false;
        }
        return true;
    }
}