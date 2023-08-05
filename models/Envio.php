<?php 

namespace Model;

class Envio extends ActiveRecord {
    protected static $tabla = 'envios';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

}