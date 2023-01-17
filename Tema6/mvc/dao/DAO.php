<?
interface DAO{
    /**
     * 
     */
    public static function findAll();
    public static function findById($id);
    public static function delete($id);
    public static function insert($objeto);//en otro sitios save()
    public static function update($objeto);//public function update($id,$objeto) si paso el objeto entero ya tiene el id, puede aparecer así
}
?>