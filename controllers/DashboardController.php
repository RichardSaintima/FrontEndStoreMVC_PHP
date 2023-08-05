<?php

namespace Controllers;

use MVC\Router;
use Model\Compras;
use Model\Usuario;



class DashboardController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
            return;
        }

        // Obtener ultimos registros
        $compras = Compras::get(5);
        foreach($compras as $compra) {
            $compra->usuario = Usuario::find($compra->usuario_id);
        }

        // Calcular los ingresos
        $entregas = Compras::total('envio_id', 2);
        $presenciales = Compras::total('envio_id', 1);
        $precioProducto = Compras::totalSum('precio','productos','compras.producto_id', 'productos.id') ?? 0;
        // debuguear($precioProducto);

        $ingresos = ($entregas * 1000 ) + ($presenciales * 0) + ($precioProducto ) ;

        // Obtener eventos con más y menos lugares disponibles


        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración',
            'compras' => $compras,
            'ingresos' => $ingresos,
            'entregas' => $entregas,
            'presenciales' => $presenciales,

        ]);
    }
}