<?php
class Solicitud
{
    private $codigo_solicitud;
    private $fecha;
    private $estado;
    private $activo;
    private $codigo_usuario;
    private $codigo_equipo;

    public function __construct($codigo_solicitud, $fecha, $estado, $activo, $codigo_usuario, $codigo_equipo)
    {
        $this->codigo_solicitud = $codigo_solicitud;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->activo = $activo;
        $this->codigo_usuario = $codigo_usuario;
        $this->codigo_equipo = $codigo_equipo;
    }
    
    public function __get($get)
    {
        if (property_exists(__CLASS__, $get)) {
             return $this->$get;
        }
        return null;
    }

    public function __set($clave, $valor)
    {
        if (property_exists(__CLASS__, $clave)) {
            $this->$clave=$valor;
        }
    }
}
