<?php 

namespace Model;

class Compras extends ActiveRecord {
    protected static $tabla = 'compras';
    protected static $columnasDB = ['id', 'producto_id', 'pago_id', 'token', 'usuario_id', 'envio_id', 'fecha', 'hora', 'cantidad'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->producto_id = $args['producto_id'] ?? '';
        $this->pago_id = $args['pago_id'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
        $this->envio_id = $args['envio_id'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
    }

}