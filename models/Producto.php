<?php 

namespace Model;

class Producto extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id',  'disponibles', 'descripcion','precio', 'imagen'];


    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->disponibles = $args['disponibles'] ?? '';
    }

    public function validar() {
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'El descripcion es Obligatorio';
        }
        if(!$this->precio) {
            self::$alertas['error'][] = 'El Precio es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
    
        return self::$alertas;
    }


}