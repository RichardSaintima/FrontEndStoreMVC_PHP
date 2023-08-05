<?php

namespace Controllers;


use MVC\Router;
use Model\Compras;
use Model\Producto;

class PaginasController {
    
    public static function index(Router $router) {

        session_start();

        $productos = Producto::all();

        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'productosObjetos' => $productos, 
        ]);
    }

    public static function nosotros(Router $router) {
        
        session_start();

        $router->render('paginas/nosotros', [
            'titulo' => 'Sobre Nosotros', 
        ]);
    }
    
    public static function error(Router $router) {
        
        session_start();

        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada', 
        ]);
    }
    public static function detalle(Router $router) {
        
        session_start();


        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /');
        }

        // Obtener productos a Editar
        $producto = Producto::find($id);
        if(!$producto) {
            header('Location: /');
        }

        $router->render('paginas/detalle_producto', [
            'titulo' => 'Detalle',
            'producto' => $producto, 
        ]);
    }

}