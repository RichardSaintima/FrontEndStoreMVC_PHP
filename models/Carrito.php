<?php 

namespace Model;

class Carrito extends ActiveRecord {
    protected static $tabla = 'carrito';
    protected static $columnasDB = ['id', 'producto_id', 'usuario_id'];

    public $id;
    public $usuario_id;
    public $producto_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->producto_id = $args['producto_id'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
    }

}