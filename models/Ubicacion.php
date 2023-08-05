<?php

namespace Model;

class Ubicacion extends ActiveRecord {
    protected static $tabla = 'ubicaciones';
    protected static $columnasDB = ['id', 'usuario_id', 'calle', 'comuna', 'region'];

    public $id;
    public $usuario_id;
    public $calle;
    public $comuna;
    public $region;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuario_id = $args['usuario_id'] ?? '';
        $this->calle = $args['cuidad'] ?? '';
        $this->comuna = $args['comuna'] ?? '';
        $this->region = $args['region'] ?? '';
    }



    // Validación 
    public function validarUbicacion() {
        if(!$this->calle) {
            self::$alertas['error'][] = 'El Nombre de la Cuidad es Obligatorio';
        }
        if(!$this->comuna) {
            self::$alertas['error'][] = 'El Nombre de la Comuna es Obligatorio';
        }
        if(!$this->region) {
            self::$alertas['error'][] = 'El Nombre del Region es Obligatorio';
        }
        return self::$alertas;
    }

}